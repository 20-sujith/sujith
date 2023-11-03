<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use session;
use App\Models\Admin;
use App\Models\gameform;
class logincontroller extends Controller
{
 public function login(Request $request) {
      

	   
        $em = $request->input('name');
           
          $pass = $request->input('password');  
     
  
  $request->session()->put('emailid', $em);
  
  
  $value = $request->session()->get('emailid');
  

  
  
  $sel_user = Admin::where('tb_loginform.email', '=', $em)
  ->where('tb_loginform.password', '=', $pass)
  ->first();
 
  $count = count((array)$sel_user);
 
  if ($count > 0) {
  return view('dashboard');
}
else
{
 return redirect()->back()->with('success', 'Invalid username or password'); 

}
    
 }




public function form(Request $request) {

  $file = $request->file('image');
  
  

  $data = array(
      'game_name' => $request->input('name'),       
      'release_year' => $request->input('number'),
      'player_mode' => $request->input('radio'),
      
	  'game_type' => $request->input('checkbox'),
      'file'=> $file->getClientOriginalName(), 
        );

  $destinationPath = 'public/assets/admin/images';
  $file->move($destinationPath,$file->getClientOriginalName());

  
  $lastInsertedId = gameform::insertGetId($data); 
return view("form"); 
}
//view


public function table(Request $request) {
  $data['table'] = gameform::select('*')->get(); //$data['anyname'] this name you need to give in viewstaffdetails near to FOREACH starting
          return view('table', $data); 
    }
//edit
	
	
	 public function edit($id=false) {//name from web.php($anyname=false) 
   
      
	
		
      $data['editemp'] = gameform::where('id', $id)->select('*')->first(); //where( id-çolumn name',$id=>$id=false)
      //$anyname["anyname"]

   return view('edit', $data);  

}
//update
public function update(Request $request) {
if(empty($request->file('image')))
{
  $data = array(
    
   'game_name' => $request->input('name'),       
      'release_year' => $request->input('number'),
      'player_mode' => $request->input('radio'),
      
	  'game_type' => $request->input('checkbox'),
);


$id=$request->input('id');

$update = gameform::where('id', $id)->update($data);
return view("dashboard"); 

}
  else
  {
    $id=$request->input('id');
//echo ($id);
//die();
  $file = $request->file('image');
  

  $data = array(
      'game_name' => $request->input('name'),       
      'release_year' => $request->input('number'),
      'player_mode' => $request->input('radio'),
      
	  'game_type' => $request->input('checkbox'),


      'file'=> $file->getClientOriginalName(), 

  );

  $destinationPath = 'public/assets/admin/images';
  $file->move($destinationPath,$file->getClientOriginalName());

  
  $update = gameform::where('id', $id)->update($data);  

return view("dashboard"); 

}
}
//delete
public function delete($id=false){
   $da= gameform::where('id', $id)->select('*')->first(); 
   $image=$da->file;
        unlink('public/assets/admin/images/'.$image);
		echo"<script>";
  echo "confirm(' Do you want to delete?')";
  echo "</script>";
  $data= gameform::where('id', $id)->delete();
   
return view('dashboard'); 
	  }
	  public function logout(Request $request) {
  Auth::logout();
  $request->session()->invalidate();
  return redirect(\URL::previous());
	  }
}	


