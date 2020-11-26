<?php

namespace App\Http\Controllers;

use App\Tarif;
use App\Category;
use App\Saison;
use Illuminate\Http\Request;
use DataTables;
use DB;

class TarifController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = DB::table('categories')->get();
        $saisons = DB::table('saisons')->get();
        
        if ($request->ajax()) {
          //  $data = City::latest()->get();
            $data = DB::table('tarifs')
                    ->join('categories','categories.id','=','tarifs.CatId')
                    ->join('saisons','saisons.id','=','tarifs.saisonId')
                    ->select('tarifs.id','tarifs.CatId','tarifs.saisonId','categories.libelle','saisons.libelle as nom', 'saisons.date_debut','saisons.date_fin','tarifs.prix')
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
      
        return view('tarif/index',compact('categories','saisons'));
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
        Tarif::updateOrCreate(['id' => $request->tarif_id],
        ['CatId' => $request->CategoryId, 'saisonId' => $request->SaisonId, 'prix' => $request->prix]);        

return response()->json(['success'=>'Tarif saved successfully.']);
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
        $tarif = Tarif::find($id);
        return response()->json($tarif);
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
        Tarif::update(['id' => $request->tarid_id],
        ['CatId' => $request->CategoryId, 'saisonId' => $request->SaisonId, 'prix' => $request->prix]);        

return response()->json(['success'=>'Tarif saved successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tarif::find($id)->delete();
     
        return response()->json(['success'=>'Tarif deleted successfully.']);
    }
}
