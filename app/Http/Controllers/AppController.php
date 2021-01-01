<?php

namespace App\Http\Controllers;

use App\app;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Http;
use Validator;
use App\User;

class AppController extends Controller
{
    
    public function index(Request $req)
    {
        
        $name = $req->session()->get('username');
        
        $users = app::where('username', $name)->get('id');
        return view('admin.home.home',compact('name','users'));
    }
    public function adminlist(){
        $useradmin ="admin";
        $users    =app::where('usertype','LIKE','%'.$useradmin."%")
                  ->get();
        return view('admin.home.adminlist')->with('users', $users);
    }
    public function managerlist(){
        $usertype ="manager";
        $users    =app::where('usertype','LIKE','%'.$usertype."%")
                  ->get();
        return view('admin.home.managerlist')->with('users', $users);
    }
    public function userlist(){
        $usertype ="user";
        $users  =app::where('usertype','LIKE','%'.$usertype."%")
                  ->get();
        return view('admin.home.userlist')->with('users', $users);
    }
    public function create()
    {
        return view('admin.home.create');
    }

   
    public function store(UserRequest $request)
    {
        $user = new app();
        $user->name         = $request->name;
        $user->username     = $request->username;
        $user->email        = $request->email;
        $user->contactno    = $request->contactno;
        $user->nid          = $request->nid;
        $user->gender       = $request->gender;
        $user->address      = $request->address;
        $user->usertype     = $request->type;
        $user->password     = $request->password;
       
        
        if($user->usertype =="admin")
        {
        if($user->save()){
            return redirect()->route('admin.home.adminlist');
        }else{
            return back();
        }
    }
    else{
        return back();
    }
    }
    public function createmanager()
    {
        return view('admin.home.createmanager');
    }

   
    public function storemanager(UserRequest $request)
    {
        $user = new app();
        $user->name         = $request->name;
        $user->username     = $request->username;
        $user->email        = $request->email;
        $user->contactno    = $request->contactno;
        $user->nid          = $request->nid;
        $user->gender       = $request->gender;
        $user->address      = $request->address;
        $user->usertype     = $request->type;
        $user->password     = $request->password;
       
        
        if($user->usertype =="manager")
        {
        if($user->save()){
            return redirect()->route('admin.home.managerlist');
        }else{
            return back();
        }
    }
    else{
        return back();
    }
    }

   
    public function edit($id)
    {
        $user = app::find($id);       
        return view('admin.home.edit', $user);
    }

   
    public function update($id, PasswordRequest $req)
    {
        $user = app::find($id); 
        $user->name         = $req->name;
        $user->email        = $req->email;
        $user->contactno    = $req->contactno;
        $user->address      = $req->address;
        $user->password     = $req->cpassword;
        $user->usertype     = $req->type;

      
        
        if($user->usertype =="admin")
        {
            $user->save();
            return redirect()->route('admin.home.adminlist');
        }
        elseif($user->usertype=="manager"){
            $user->save();
            return redirect()->route('admin.home.managerlist');
        }
        else{
            $user->save();
            return redirect()->route('admin.home.userlist');
        }

        
    }

   
    public function delete($id){
        
        $user = app::find($id);
        if($user->usertype=="admin")
        {
            $user->delete();

            return redirect()->route('admin.home.adminlist');
        }
        elseif($user->usertype=="manager")
        {
            $user->delete();

            return redirect()->route('admin.home.managerlist');
        }
        else{
            $user->delete();

            return redirect()->route('admin.home.userlist');
        }

        
    }
    public function index2()
    {
     return view('admin.home.users');
    }
    public function search(Request $request)
    {
      
       if($request->ajax()){
    
         $output="";
         $products = app::where('username','LIKE','%'.$request->search."%")
         ->orWhere('id', 'LIKE','%'.$request->search."%")
         ->orWhere('name','LIKE','%'.$request->search."%")
         ->orWhere('usertype', 'LIKE','%'.$request->search."%")
         ->orWhere('address', 'LIKE','%'.$request->search."%")
         ->orWhere('email', 'LIKE','%'.$request->search."%")
         ->get();
         
         if($products){
      
            foreach ($products as  $product) {
            
             $output.='<tr>'.
             
             '<td>'.$product->id.'</td>'.

             '<td>'.$product->name.'</td>'.
             
             '<td>'.$product->username.'</td>'.
             
             '<td>'.$product->usertype.'</td>'.
             
             '<td>'.$product->email.'</td>'.

             '<td>'.$product->gender.'</td>'.

             '<td>'.$product->address.'</td>'.
             
             '</tr>';
         
            }
            return $output;  
 
         }
   
       }
 
    }
    public function pdf(){
        $usertype = "admin";
        $users = app::where('usertype',$usertype)
                ->get();
        $filename = 'Admin List.pdf';
        $mpdf = new \Mpdf\Mpdf([
           
        ]);
        $html = \View::make('admin.home.userpdf')->with('users', $users);
        $html = $html->render();
        $mpdf->WriteHtml($html);
        $mpdf->Output($filename,'I');
        
     }
     public function mpdf(){
        $usertype = "manager";
        $users = app::where('usertype',$usertype)
                ->get();
        $filename = 'Manager List.pdf';
        $mpdf = new \Mpdf\Mpdf([
           
        ]);
        $html = \View::make('admin.home.userpdf')->with('users', $users);
        $html = $html->render();
        $mpdf->WriteHtml($html);
        $mpdf->Output($filename,'I');
        
     }
     public function updf(){
        $usertype = "user";
        $users = app::where('usertype',$usertype)
                ->get();
        $filename = 'User List.pdf';
        $mpdf = new \Mpdf\Mpdf([
           
        ]);
        $html = \View::make('admin.home.userpdf')->with('users', $users);
        $html = $html->render();
        $mpdf->WriteHtml($html);
        $mpdf->Output($filename,'I');
        
     }
     public function salarylist(){
       
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3000/adminhome/salarylist');
        echo $response->getBody();
         
    }
    public function transaction(){
       
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3000/adminhome/transaction');
        echo $response->getBody();
         
    }
  
    public function adminedit(Request $req)
    {
        $id= $req->session()->get('id');
        /*$users = app::select('id')->where('username', $name)->get();
                 
        if(count((array)$users) > 0){
            $user = app::find($users);       
           
        }*/
        return $id;
       
       
       
       
    }
    public function updateadmin()
    {
        

        
    }



}
