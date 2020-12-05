<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\DataJemaatImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function importIndex()
    {
        return view('pages.jemaat.import');
    }
    public function import()
    {
        set_time_limit(300);
        Excel::import(new DataJemaatImport,request()->file('file'));
           
        return back()->with(['success' => 'Import Data Jemaat berhasil di tambahkan']);
    }
}
