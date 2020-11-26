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
class FindRoomController extends Controller
{

    private  $debut;
    private  $fin;
//public $data=array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $categories = DB::table('categories')->get();
      
        $date_debut = $request->input('debut');
        $date_fin = $request->input('fin');
      /*  $_SESSION['debut'] = $date_debut;
        $_SESSION['fin'] = $date_fin;
         $request->session()->put('debut',$date_debut);
         $request->session()->put('fin',$date_fin);
        $this->debut=   $request->session()->get('debut');
        $this->fin=   $request->session()->put('fin');
          */
          $this->debut = $date_debut;
          $this->fin = $date_fin;
       
        if ($request->isMethod('POST')) {   

            
           // dd($date_debut,$date_fin);
          
            $rooms =DB::table('rooms') 
                    ->join('categories','categories.id','=','rooms.CatId') 
                 //   ->join('saisons','saisons.id','=','tarifs.saisonId') 
                  //  ->join('tarifs','tarifs.CatId','=','categories.id') 
                       
                     ->whereNotIn('rooms.id',function ($query) use ($date_debut,$date_fin) {
             
                            $query->select('RoomId')->from('reservations')
                            ->Where('date_debut','>=', $date_debut)
                           ->orwhere('date_fin' ,'<=',$date_fin);            
                        }) 

                      
            ->select('rooms.*','categories.libelle')
            ->get();
            $this->debut = $date_debut;
            $this->fin = $date_fin;
           
        } else {
            $rooms = null;
        }
        
     //   dd($date_debut,$date_fin);

        return view('find_rooms.index',compact('rooms','categories'))->with('date_debut',$date_debut)->with('date_fin',$date_fin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $users = DB::table('users')->get();
      //  dd($this->debut);
        $findrooms = Room::find($id);
   $this->date_debut = $this->debut;
   $this->date_fin= $this->fin;//dd( $this->date_debut);
        return view('find_rooms.create',['room' => $findrooms,'users'=>$users])->with('date_debut',$this->date_debut);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saison = new Reservation();

        $saison->RoomId  = $request->input('vv');
        $saison->clientId = $request->input('client');
        $saison->date_debut = $request->input('debut');
        $saison->date_fin = $request->input('fin');
        $saison->date_reservation = Carbon::now();
        $saison->save();
  
        return redirect('booking');
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
        //
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
        //
    }
}
