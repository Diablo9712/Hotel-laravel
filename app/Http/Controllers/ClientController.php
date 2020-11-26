<?php

namespace App\Http\Controllers;

use App\User;
use App\Country;
use App\City;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Validator;
use Illuminate\Support\Facades\Hash;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = DB::table('countries')->get();
        $test = DB::table('users')
        ->where('users.role' ,'client')
        ->join('countries','countries.id','=','users.CountryId')
        ->join('cities','cities.id','=','users.CityId')
        ->select('users.*','countries.name','cities.nom')
        ->get();

        if(request()->ajax())
        {
            return datatables()->of($test)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('client/index',compact('countries'));
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
        $rules = array(
            'fullname'    =>  'required',
            'cin'     =>  'required',
            'gender'  => 'required',
            'CountryId'    =>  'required',
            'CityId'     =>  'required',
            'phone'    =>  'required',
            'address'     =>  'required',
            'email'    =>  'required',
            'password'     =>  'required',
            'codepostal'    =>  'required',
            
            'image'         =>  'required|image|max:2048'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('images'), $new_name);

        $form_data = array(
            'fullname'        =>  $request->fullname,
            'cin'         =>  $request->cin,
            'gender'         =>  $request->gender,
            'CountryId'        =>  $request->CountryId,
            'CityId'         =>  $request->CityId,
            'phone'        =>  $request->phone,
            'address'         =>  $request->address,
            'email'        =>  $request->email,
            'password'         =>  Hash::make($request->password), 
            'codepostal'        =>  $request->codepostal,
            'image'             =>  $new_name,
            'role'              => 'client'
        );

        User::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
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
        if(request()->ajax())
        {
            $data = User::findOrFail($id);
            return response()->json(['data' => $data]);
        }
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $rules = array(
                'fullname'    =>  'required',
            'cin'     =>  'required',
            'gender' => 'required',
            'CountryId'    =>  'required',
            'CityId'     =>  'required',
            'phone'    =>  'required',
            'address'     =>  'required',
            'email'    =>  'required',
            'password'     =>  'required',
            'codepostal'    =>  'required',
            
            'image'         =>  'required|image|max:2048'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $rules = array(
                'fullname'    =>  'required',
                'cin'     =>  'required',
                'gender'  => 'required',
                'CountryId'    =>  'required',
                'CityId'     =>  'required',
                'phone'    =>  'required',
                'address'     =>  'required',
                'email'    =>  'required',
                'password'     =>  'required',
                'codepostal'    =>  'required',
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        $form_data = array(
            'fullname'        =>  $request->fullname,
            'cin'         =>  $request->cin,            
            'gender'         =>  $request->gender,
            'CountryId'        =>  $request->CountryId,
            'CityId'         =>  $request->CityId,
            'phone'        =>  $request->phone,
            'address'         =>  $request->address,
            'email'        =>  $request->email,
            'password'         => Hash::make($request->password), 
            'codepostal'        =>  $request->codepostal,
            'image'            =>   $image_name
        );
        User::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
    }
}
