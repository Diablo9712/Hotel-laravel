<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Room;
use App\Category;
use Illuminate\Http\Request;
use DataTables;
use DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = DB::table('categories')->get();
        $hotels = DB::table('hotels')->get();
        
        if ($request->ajax()) {
          //  $data = City::latest()->get();
            $data = DB::table('rooms')
                    ->join('categories','categories.id','=','rooms.CatId')
                    ->join('hotels','hotels.id','=','rooms.HotelId')
                    ->select('rooms.id','rooms.number','rooms.phone','categories.libelle', 'hotels.namehotel')
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
      
        return view('room/index',compact('categories','hotels'));
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // Room::updateOrCreate(['id' => $request->room_id],
    //    ['number' => $request->number, 'phone' => $request->phone, 'occupee' => 0, 'CatId' => $request->CatId, 'HotelId' => $request->HotelId]);        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Room::updateOrCreate(['id' => $request->room_id],
        ['number' => $request->number, 'phone' => $request->phone, 'occupee' => 0 , 'CatId' => $request->CatId, 'HotelId' => $request->HotelId]); 
return response()->json(['success'=>'Room saved successfully.']);
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
        $room = Room::find($id);
        return response()->json($room);
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
        Room::find($id)->delete();
     
        return response()->json(['success'=>'Room deleted successfully.']);
    }
}
