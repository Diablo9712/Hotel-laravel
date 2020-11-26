<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ExportDataTable;

class ExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(ExportDataTable $dataTable)
    {
     return $dataTable->render('export');
    }
}
