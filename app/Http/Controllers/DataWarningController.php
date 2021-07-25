<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_jemaat;
use Carbon\Carbon;
use DataTables;

class DataWarningController extends Controller
{
    public function tanggalLahir(Request $request)
    {
        //find data jemaat ketika tanggal lahir kurang dari tahun 1940 dan lebih dari tanggal hari ini
        $datajemaats = data_jemaat::where('jemaat_tanggal_lahir', '<', '1940-01-01')
            ->orWhere('jemaat_tanggal_lahir', '>', Carbon::now())
            ->where('jemaat_status_aktif', 't')
            ->get();

        //return data to Datatable serverside
        if($request->ajax()){  
            return DataTables::of($datajemaats)
                ->editColumn('lingkungan', function($datajemaats) { 
                    return $datajemaats->id_lingkungan . ' - ' . $datajemaats->lingkungan->nama_lingkungan ;
                })
                ->editColumn('jemaat_tanggal_lahir', function($datajemaats) {
                    return $datajemaats->jemaat_tanggal_lahir->formatLocalized('%d %B %Y') . '<span class="text-right"> <i class="fa fa-exclamation-circle" style="color:red"></i> </span>' ;
                })
                ->addColumn('jemaat_status_aktif', function($datajemaats) { return '<span class="label label-primary">Aktif</span>'; })
                ->addColumn('action', function($data){
                    $button = '<a href="'. Route('profiledetail', $data->id) .'" target="_blank" class="btn btn-icon btn-sm btn-primary" id="btnDetail" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye" style="width: 20px;"></i>Lihat</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="'. Route('jemaateditprofile', $data->id) .'" target="_blank" class="btn btn-icon btn-sm btn-warning" id="btnEdit" data-toggle="tooltip" data-placement="top" title="Edit"><i i class="fa fa-edit" style="width:20px"></i>Edit</a>';
                    return $button;
                })
                ->rawColumns(['jemaat_tanggal_lahir','action','jemaat_status_aktif'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('pages.data-warning.tanggal-lahir');
    }
}
