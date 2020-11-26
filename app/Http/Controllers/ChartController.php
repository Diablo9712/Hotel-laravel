<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Charts;
use App\User;
use DB;

class ChartController extends Controller
{
  /*  public function index()
    {
    	$users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart = Charts::database($users, 'bar', 'highcharts')
			      ->title("Monthly new Register Users")
			      ->elementLabel("Total Users")
			      ->dimensions(1000, 500)
			      ->responsive(false)
			      ->groupByMonth(date('Y'), true);
        return view('chart',compact('chart'));
    }*/

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $data = \DB::select('SELECT services.description,COUNT(service__demandes.ServiceId),sum(prix) total FROM `services`,`service__demandes` where services.id = service__demandes.ServiceId

        GROUP by description');

        return view('dashboard',compact('data'));
    }
}