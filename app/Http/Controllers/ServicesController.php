<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Service_Demande;
use App\User;
use Validator;
use DB;
use Illuminate\Support\Facades\Input;


class ServicesController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $users = DB::table('users')->get();
        $services = DB::table('services')->get();
        if(request()->ajax())
        {
            return datatables()->of(DB::table('service__demandes')
            ->join('services','services.id','=','service__demandes.serviceId')
            ->join('users','users.id','=','service__demandes.clientId')
            ->select('service__demandes.id','users.fullname','services.description','services.prix','services.image')
            ->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('services/index',compact('users','services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        if(request()->ajax())
        {
            return datatables()->of(DB::table('service__demandes')
            ->join('services','services.id','=','service__demandes.serviceId')
            ->join('users','users.id','=','service__demandes.clientId')
            ->select('service__demandes.id','users.fullname','services.description','services.prix','services.image')
            ->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

     //   $users = DB::select('select service__demandes.id,services.description, services.prix,services.images,users.fullname from service__demandes,services,users where services.id = service__demandes=serviceId and users.id = service__demandes.clientId');
        return view('services/create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $services =new Service_Demande();
       // $input = $this->request->all();
    $subjects = $request->all();
    $i=0;
        foreach($subjects as $subject)
        {
            $services = new Service_Demande();
            $x = count($subjects);
           if($i <= $x){
            $services->clientId= $request->input('client');
            $services->serviceId= $subjects['service'][$i];
           // dd();    
            $services->save(); 
            $i++; 
           }
        }
        */

        $subjects = $request->all();
        $x = count($subjects);
       // dd($x);
       // $i=0;
            for($i=0; $i< $x; $i++)
            {
                
            $services =new Service_Demande();
               // $x = count($subjects);
              // if($i <= $x){
                $services->clientId= 26;
               // dd( $subjects['service'][$i]);    

                $services->serviceId= $subjects['service'][$i];
               $services->save(); 
               // $i++; 
              // }
            }
       
  
        return redirect('services');
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
