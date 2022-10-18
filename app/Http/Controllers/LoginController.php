<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\logging;
use Response;
class LoginController extends Controller
{

	 
	 
	public function login($msg=0){
		return view('login.login')->with('msg',$msg); 
	 }
	
	public function dologin(request $request){
		$validatedData = $request->validate([
        'loginemail' => 'required|email',
        'loginpassword' => 'required'
    ]);
	
	$userdata = array(
        'email'     => $request->Input('loginemail'),
        'password'  => $request->Input('loginpassword')
    );
	
	if (\Auth::attempt($userdata)) {
		if(\Auth::user()->jogkor=='user'){
			return redirect()->route('wellcome.index');	
		}
		
		return redirect()->route('wellcome.index');
		

    } else{
		return back()->with(['msg' => 'Nem jó!'])->withInput($request->input());
		
	}
	} 
	 
	public function logout(){

		\Auth::logout(); 
		return redirect()->route("login.login",['msg2'=>0]);
	 }
	 	
	public function changepassword(){	
		return view('login.changepassword'); 
	 }
	 
	 public function dochangepassword(request $request){
		$validatedData = $request->validate([
        'newpassword' => 'required|min:6|max:32',
        'repassword' => 'required'
    ]);	
	$user=DB::table('users')->where('email','=',\Auth::user()->email)->first();

    if($request->input('newpassword')==($request->input('repassword'))){
	
	DB::table('users')
		->where('email','=',\Auth::user()->email)
		->update(
        [
		'password' => \Hash::make($request->input('newpassword'))
		]
    );
	return redirect()->route('wellcome.index');
	
	}else{
		return back()->with(['msg' => 'nem egyezik a jelszó és a megerősítés!'])->withInput($request->input());
		}	
	}
}
