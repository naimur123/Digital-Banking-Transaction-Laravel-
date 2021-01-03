<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use App\User;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){
    	return view('login.login');
    }
    public function verify(Request $req){
               
        $user = DB::table('users')
                    ->where('username', $req->username)
                    ->where('password', $req->password)
                    ->first();
       

    	if($user != NULL){
          
    		$req->session()->put('username', $req->username);
            $req->session()->put('usertype', $user->usertype);
            $req->session()->put('id', $user->id);
         
           
          
           
            
    		return redirect()->route('admin.home.home');
    	}else{
    		$req->session()->flash('msg', 'invalid username/password');
    		return redirect('/app/login');

    	}
    }
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        return $user->getName();
        
        
    

        // $user->token;
    }
   

}
