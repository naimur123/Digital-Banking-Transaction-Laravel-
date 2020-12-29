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
               
        $user = DB::table('user')
                    ->where('username', $req->username)
                    ->where('password', $req->password)
					->first();
		
					//print_r($user);

        /*$user = User::where('username', $req->username)
                    ->where('password', $req->password)
                    ->first();*/

    	if(count((array)$user) > 0){
    		$req->session()->put('username', $req->username);
            $req->session()->put('usertype', $req->type);
            
    		return redirect()->route('admin.home.home');
    	}else{
    		$req->session()->flash('msg', 'invalid username/password');
    		return redirect('/app/login');
    		//return view('login.index');
    	}
    }
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $user1 = new app();
        $user1->name         = $user->name;
        $user1->save();

        
    

        // $user->token;
    }
   

}
