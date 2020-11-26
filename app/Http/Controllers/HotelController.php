<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Country;
use App\City;
use Illuminate\Http\Request;
use DataTables;
use DB;
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = DB::table('countries')->get();
      //  $cities = DB::table('cities')->get();
        
        if ($request->ajax()) {
          //  $data = City::latest()->get();
            $data = DB::table('hotels')
                    ->join('countries','countries.id','=','hotels.CountryId')
                    ->join('cities','cities.id','=','hotels.CityId')
                    ->select('hotels.id','hotels.namehotel','hotels.CountryId','hotels.CityId','hotels.address','cities.nom', 'countries.name','hotels.codepostal','hotels.phone')
                    ->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('hotel/index',compact('countries'));
    }

    public function getStates($id){

        $cities = City::where('CountryId',$id)->pluck('nom','id');

        return json_encode($cities);
}




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        
        Hotel::updateOrCreate(['id' => $request->hotel_id],
        ['namehotel' => $request->namehotel,'CountryId' => $request->CountryId, 'CityId' => $request->CityId, 'address' => $request->address, 'codepostal' => $request->codepostal, 'phone' => $request->phone]);        

return response()->json(['success'=>'Hotel saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotel::find($id);
        return response()->json($hotel);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hotel::find($id)->delete();
     
        return response()->json(['success'=>'Hotel deleted successfully.']);
    }

}
