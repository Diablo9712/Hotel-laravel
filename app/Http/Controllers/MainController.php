<?php

namespace App\Http\Controllers;
use App\Country;
use App\City;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $countries = Country::all()->pluck('name','id');

        return view('welcome',compact('countries'));
    }

    public function getStates($id){

        $cities = City::where('CountryId',$id)->pluck('nom','id');

        return json_encode($cities);
}
}
