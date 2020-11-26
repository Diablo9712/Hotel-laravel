<?php

  

namespace App\Http\Controllers\Auth;

  

use App\Http\Controllers\Controller;

use Socialite;

use Auth;

use Exception;

use App\User;

  

class GoogleController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();

    }

      

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function handleGoogleCallback()

    {

        try {

    

            $user = Socialite::driver('google')->user();

     

            $finduser = User::where('provider_id', $user->id)->first();

     

            if($finduser){

     

                Auth::login($finduser);

    

                return redirect('/home');

     

            }else{

                $newUser = User::create([

                    'fullname' => $user->name,
                  //  'gender' => $user->gender,
                    'role' => 'client',
                   // 'phone' => $user->phone,


                    'email' => $user->email,

                    'provider_id'=> 'GOOGLE',

                    'password' => encrypt('redabtburn16041997@#')

                ]);

    

                Auth::login($newUser);

     

                return redirect('/home');

            }

    

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }

}