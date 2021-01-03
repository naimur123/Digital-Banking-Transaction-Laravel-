<?php

namespace App\Http\Controllers;

use App\app;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Http;
use Validator;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class AppController extends Controller
{
    
    public function index(Request $req)
    {
        
        $name = $req->session()->get('username');
        $id = $req->session()->get('id');
        
        $user=  app::where('id','LIKE','%'.$id."%")
                ->get();
       return view('admin.home.home')->with('user', $user);
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
        if($request->hasFile('myimg')){
        $file = $request->file('myimg');
        if($file->move('upload', $file->getClientOriginalName())){

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
        $user->profile_img  = $file->getClientOriginalName();
       
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
    public function createagent()
    {
        return view('admin.home.createagent');
    }
    public function storeagent(Request $request)
    {
        $form_data = array(
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'contactno'=> $request->contactno,
            'nid'      => $request->nid,
            'gender'   => $request->gender,
            'address'  => $request->address,
            'usertype' => $request->type,
            'password' => $request->password
        );
        // Storage::disk('public')->put('pending.json', response()->json($form_data));
         return $form_data;
        
        
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
    public function adminedit(Request $req)
    {
        $id= $req->session()->get('id');
        $value = app::find($id);
        return view('admin.home.adminedit', $value);

    }
    public function updateadmin(PasswordRequest $req)
    {
        if($req->hasFile('myimg'))
        {
        $file = $req->file('myimg');
        if($file->move('upload', $file->getClientOriginalName()))
        {

        $id= $req->session()->get('id');
        $user = app::find($id); 
        $user->name         = $req->name;
        $user->email        = $req->email;
        $user->contactno    = $req->contactno;
        $user->address      = $req->address;
        $user->password     = $req->cpassword;
        $user->usertype     = $req->type;
        $user->profile_img  = $file->getClientOriginalName();

      
        
        if($user->usertype =="admin")
        {
            $user->save();
            return redirect()->route('admin.home.home');
        }
      
    }
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
  
   
   



}
