<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearch extends Controller
{

    function index()
    {   $clients = DB::table('clients')->get();

      //return view('user.index', ['users' => $users]);
     return view('live_search',['clients' => $clients]);
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('clients')
       ->where('name','like','%'.$query.'%')
       ->orWhere('cin','like','%'.$query.'%')
       ->orWhere('address','like','%'.$query.'%')
       ->orWhere('telephone','like','%'.$query.'%')
       ->orWhere('email','like','%'.$query.'%')
       ->orderBy('id','desc')
       ->get();

         
         
      }
      else
      {
       $data = DB::table('clients')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
                <td>'.$row->name.' '.$row->lname.'</td>
                <td>'.$row->cin.'</td>
                <td>'.$row->address.'</td>
                <td>'.$row->telephone.'</td>
                <td>'.$row->email.'</td>
        </tr>
        ';
        $output .='
        <option value="'.$row->id.'">'.$row->name.' '.$row->lname.'</option>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
  
}
