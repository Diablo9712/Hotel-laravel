<?php
namespace App\Http\Controllers;
use App\Country;
use App\Imports\CsvImport;
use Illuminate\Http\Request;

use App\Exports\CsvExport;
//use App\Imports\CsvImport;
use Maatwebsite\Excel\Facades\Excel;

//use App\Imports\CsvImport;
class CsvFile extends Controller
{
    function index(){

        $data = Country::latest()->paginate(15);

        return view('csv_file_pagination',compact('data'))->with('i',(request()->input('page',1) -1) *10); 
    }

    public function csv_export(){

        return Excel::download(new CsvExport, 'sample.csv');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function csv_import(){
       //     dd(Excel::import(new CsvImport, request()->file('file')));
       Excel::import(new CsvImport, request()->file('file'));
        return back();

/*$request->validate([
            'import_file' => 'required|mimes:xlsx'
        ]);
        Excel::import(new CsvImport, request()->file('file'));
        return back()->with('success', 'Category imported successfully.');*/
    }


}
