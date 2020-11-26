<?php

namespace App\Http\Controllers;

use App\Room;
use App\Category;
use App\Reservation;
use App\Saison;
use App\Tarif;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

class BookingController extends Controller
{
    private  $debut;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = DB::table('reservations')
        ->join('users','users.id','=','reservations.clientId')       
        ->join('rooms','rooms.id','=','reservations.RoomId')       
        ->join('categories','categories.id','=','rooms.catId')    
        ->join('tarifs','tarifs.catId','=','categories.id')          
        ->join('saisons','saisons.id','=','tarifs.saisonId')
         ->select('reservations.id as id','users.fullname','categories.libelle', 'rooms.number','reservations.date_debut as debut','reservations.date_fin as fin')
        
                ->get();
                if(request()->ajax())
                {
                    return datatables()->of($test)
                            ->addColumn('action', function($data){
                                $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                         
                                $button .= '&nbsp;&nbsp;';
                             
                               $button .= "<a href=\"booking/create/".$data->id."\"class='btn btn-sm btn-success'>
                            
                               Afficher
                            </a>" ;
                                return $button;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
                }
  
    return view('booking/index');
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
    public function create($id)
    {
        
     /*   $this->debut = $id;
     //  dd($this->debut);
        $test = DB::table('reservations')
        ->join('users','users.id','=','reservations.clientId')       
        ->join('rooms','rooms.id','=','reservations.RoomId')       
        ->join('categories','categories.id','=','rooms.catId')    
        ->join('tarifs','tarifs.catId','=','categories.id')          
        ->join('saisons','saisons.id','=','tarifs.saisonId')
         ->select('reservations.id as idd','users.fullname','categories.libelle', 'rooms.number','reservations.date_debut as debut','reservations.date_fin as fin','tarifs.prix as price')
        ->where('reservations.id','=', $this->debut)   
         ->get();
                if(request()->ajax())
                {
                    
                    

                    return datatables()->of($test)
                            ->addColumn('action', function($data){
                                $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                                $button .= '&nbsp;&nbsp;';
                                return $button;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
                }
  */
    return view('booking/create')->with('name', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('booking/edit')->with('name', $id);
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
        $data = Reservation::findOrFail($id);
        $data->delete();
    }
}
