<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Charts;
use DB;
public function __construct()
{
    $this->middleware('auth');
}
class CharttController extends Controller
{
    public function index()
    {
         $products = Product::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
         $chart = Charts::database($products, 'bar', 'highcharts')
                     ->title('Product Details')
                     ->elementLabel('Total Products')
                     ->dimensions(1000, 500)
                     ->colors(['red', 'green', 'blue', 'yellow', 'orange', 'cyan', 'magenta'])
                     ->groupByMonth(date('Y'), true);
        return view('charts', ['chart' => $chart]);
    }
}
