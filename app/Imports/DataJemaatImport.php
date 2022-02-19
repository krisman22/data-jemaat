<?php

namespace App\Imports;

use App\Models\data_jemaat;
use App\Models\DataKeluarga;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataJemaatImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $nostambuk = $this->generateNomorStambuk($row['jemaat_tanggal_lahir'],$row['jemaat_tanggal_baptis'],$row['jemaat_jenis_kelamin']);

            data_jemaat::create([
                'id' => $row['id'],
                'jemaat_nomor_stambuk' => $nostambuk,
                'jemaat_nama' => $row['jemaat_nama'],
                'jemaat_gelar_depan' => $row['jemaat_gelar_depan'],
                'jemaat_gelar_belakang' => $row['jemaat_gelar_belakang'],
                'jemaat_nama_alias' => $row['jemaat_nama_alias'],
                'jemaat_tempat_lahir' => $row['jemaat_tempat_lahir'],
                'jemaat_tanggal_lahir' => $this->transformDate($row['jemaat_tanggal_lahir']),
                'jemaat_jenis_kelamin' => $row['jemaat_jenis_kelamin'],
                'jemaat_tanggal_baptis' => $this->transformDate($row['jemaat_tanggal_baptis']),
                'jemaat_tanggal_sidi' => $this->transformDate($row['jemaat_tanggal_sidi']),
                'jemaat_status_perkawinan' => $row['jemaat_status_perkawinan'],
                'jemaat_tanggal_perkawinan' => $this->transformDate($row['jemaat_tanggal_perkawinan']),
                'id_pendidikan_akhir' => $row['id_pendidikan_akhir'],
                'id_lingkungan' => $row['id_lingkungan'],
                'jemaat_tanggal_bergabung' => "2018-12-31", //hardcode
                'jemaat_alamat_rumah' => $row['jemaat_alamat_rumah'],
                'jemaat_nomor_hp' => $row['jemaat_nomor_hp'],
                'jemaat_email' => $row['jemaat_email'],
                'jemaat_status_aktif' => "t", //hardcode
                'id_pekerjaan' => $row['id_pekerjaan'],
                'jemaat_status_dikeluarga' => $row['jemaat_status_dikeluarga'],
                'id_parent' => $row['id_parent'],
                'jemaat_golongan_darah' => $row['jemaat_golongan_darah'],
                'jemaat_kk_status' => $row['jemaat_kk_status'],
            ]);

            DataKeluarga::create([
                'no_stambuk' => $nostambuk,
                'nama_ayah' => $row['nama_ayah'],
                'nama_ibu' => $row['nama_ibu'],
                'status_hubungan' => 1,
            ]);
        }
    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        if(!strlen($value)) return null;
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function generateNomorStambuk($lahir, $baptis, $jenisKelamin)
    {
        $tglLahir = $this->transformDate($lahir);
        $tglbaptis = $this->transformDate($baptis);
        if($tglbaptis == null){
            $tglbaptis = '0000-00-00';
        }
       
        $tls = substr($tglLahir, 0, 4) . substr($tglLahir, 5, 2) . substr($tglLahir, 8, 2);
        $baps = substr($tglbaptis, 0, 4) . substr($tglbaptis, 5, 2);
        $jk = $jenisKelamin;
        if(strtolower($jk) == 'l'){
            $jks = 1;
        }
        elseif(strtolower($jk) == 'p'){
            $jks = 2;
        }        
        $def="00";
        $plus = 1;
        $nomorstambuk = $tls.''.$baps.''.$jks.''.$def.''.$plus;

        $check = data_jemaat::where('jemaat_nomor_stambuk', $nomorstambuk)->first();
        do {
            if(strlen($nomorstambuk) == '19'){
                $def = "0";
                $nomorstambuk = $tls.''.$baps.''.$jks.''.$def.''.$plus;            
            }
            elseif(strlen($nomorstambuk) == '20'){
                $def = "";
                $nomorstambuk = $tls.''.$baps.''.$jks.''.$def.''.$plus;
            }
            $check = data_jemaat::where('jemaat_nomor_stambuk', $nomorstambuk)->first();
            if($check!=null){
                $plus +=1;
            }
            $nomorstambuk = $tls.''.$baps.''.$jks.''.$def.''.$plus;
        } while ($check!=null);
       
        return $nomorstambuk;
    }
}
