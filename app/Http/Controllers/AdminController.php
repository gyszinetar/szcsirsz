<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
class AdminController extends Controller
{

	 
	public function createuser(){
	
		 return view('admin.createuser'); 
	 }	

	 public function createuserstore(request $request){
		 
		 
		 $validatedData = $request->validate([
        'name' => 'required|unique:users',
        'email' => 'required|unique:users|email',
        'password' => 'required|min:6|max:32'
    ]);	
	
	$id = DB::table('users')->insertGetId(
    array(
	'name' => $request->input('name'), 
	'email' => $request->input('email'), 
	'password' => \Hash::make($request->input('password')), 
	'jogkor' => $request->input('jogkor'),
	));
	
		
		return redirect()->route('wellcome.index'); 
	 }
	 
	 public function manageuser(){
		$users=DB::table('users')->orderby('name')->get(); 

		return view('admin.manageuser')->with('users',$users); 
	 }

	public function manageuserselect(request $request){
		$user=DB::table('users')->where('id','=',$request->users)->first(); 
		return view('admin.manageuserselected')->with('user',$user); 
	 }
	 
	public function manageusergo(request $request){
		 $validatedData = $request->validate([
			'name' => 'required|unique:users,id,'.$request->id,
			'email' => 'required|unique:users,id,'.$request->id.'|email'
        
    ]);	
		 DB::table('users')
		->where('id','=',$request->id)
		->update(
        [
		'name' => $request->input('name'),
		'email' => $request->input('email'),
		'jogkor' => $request->input('jogkor')
		]
    );
		return redirect()->route('wellcome.index');  
	 }


}