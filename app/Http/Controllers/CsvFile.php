<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CsvExport;
use App\Exports\UsersExport;
use App\Imports\CsvImport;
use Maatwebsite\Excel\Facades\Excel;

use App\User;


class CsvFile extends Controller
{
    function index()
    {
        $data = User::latest()->paginate(10);
        // dd($data);
        return view('csv_file_pagination', compact('data'))
                ->with('i', (request()->input('page',1) -1)*10);
    }

    public function userById($id)
    {
        return Excel::download(new UsersExport($id), 'sample.csv');
    }

    function csv_export()
    {
        return Excel::download(new CsvExport, 'sample.csv');
    }
    function csv_import()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }
}
