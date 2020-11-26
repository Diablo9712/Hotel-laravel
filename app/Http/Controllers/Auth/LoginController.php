<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;

class LoginController extends Controller
{

        /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function redirectToProvider()

    {

        return Socialite::driver('github')->redirect();

    }

      

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function handleProviderCallback()

    {

        try {

    

            $user = Socialite::driver('github')->user();

     

            $finduser = User::where('provider_id', $user->id)->first();

     

            if($finduser){

     

                Auth::login($finduser);

    

                return redirect('/home');

     

            }else{

                $newUser = User::create([

                    'fullname' => $user->Name,

                    'email' => $user->email,

                    'provider_id'=> $user->id,

                    'password' => encrypt('redabtburn16041997')

                ]);

    

                Auth::login($newUser);

     

                return redirect('/find_rooms');

            }

    

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

 /*   public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
  /*  public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $authUser = $this->findOrCreateUser($user,$provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
//         $user->token;
    }

    public function findOrCreateUser($user, $provider){
        $authUser = User::where('provider_id', $user->id)->first();
        if($authUser){
            return $authUser;
        }
        return User::create([
            'fullname' => $user->name,
            'email' => $user->email,
          //  'password' => $user->password,
            'provider' => strtoupper($provider),
            'provider_id' => $user->id,
          //  'gender' => $user->gender
         ]);
    }*/

  
}
