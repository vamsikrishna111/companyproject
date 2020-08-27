<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule; 
use DB;
use App\Employee;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function login(Request $r){
        $r->session()->forget('data');
        return view('login');
    }
    public function register(){
       return view('companyregister');
     
    }
    public function insertregister(Request $r){

        $r->validate([
           
            'location'=>'required',
           'password' => 'required',
           'cpassword' => 'required|same:password',
               
           'email' => [
               'required',
               'email',
               'max:255',
              
               Rule::unique('company'),


           ],
    

       ]);
        
        

        
        $insert=new Employee;
         $insert->location=$r->location;
         $insert->email=$r->email;
         $insert->password=$r->password;
         $insert->cpassword=$r->cpassword;
         $insert->save();
       // echo $insert;die();
   return redirect('/')->with('success','register succesfully please login!');
          
        }
     
     
    public function companylogin(Request $r){
          
$r->validate(
    [
   
    'email'=>  'required',
           'password' => 'required',
         
    ]);
   
     $email=$r->email;
     $password=$r->password;
    
     
    $data= DB::select('select * from company where email = ? and password=?',[$email,$password]);
   // print_r($data);die();
   

      if(count($data)==1){
          $r->session()->put('data', $data);
          $data=$r->session()->get('data');
           return redirect()->to('dashboard');
        //  return view('dashboard',['data'=>$data]);
        


       
      
      }else{
        return back()->with('error','please enter correct cretendials');
      }
    }
     
   
     
    
 
   
    public function forgetpassword(){
        return view(' forgetpassword');
    }
    public function conformpassword(Request $r){

  $r->validate([
    'email' => [
        'required',
        'email',
        'max:255'
        
    ],
    'password' => 'required',
    'cpassword' => 'required|same:password',
]);


   
    $email=$r->email;
    $password=$r->password;
    $cpassword=$r->cpassword;
   

    
    $data= DB::select('select * from company where email = ?',[$email]);
    if(count($data)==1){
        $data=$data[0]->password;
        if($data==$password){
            return back()->with('error','your old password and new password are same please change');
  
      } else{
        $data1=  DB::update('update company set password = ?, cpassword=? where email = ?',[$password,$cpassword,$email]);
        if($data1==1){
            return redirect('/')->with('success','your password is set');
     
         }else{
           // die('hii');

              return back()->with('error','your password is not ready please try again');
     
         }

      }

    }else{
       // die('hii');
        return back()->with('error','please enter register email');

    }
}
public function dashboard(Request $r){
   
    $data=$r->session()->get('data');
  
   return view('dashboard',['data'=>$data]);
  

}
}
    
