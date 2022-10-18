@extends('layout')
@section('content')
<h1 style='text-align:center;margin-top:100px'>Felhasználó létrehozása</h1>
@if (Session::has('msg'))
<div class="alert-danger">{{Session::get('msg')}}</div>
@endif
<?php 
$output="";

if($errors->first('name')){$output.=$errors->first('name')."<br>";} 
if($errors->first('email')){$output.=$errors->first('email')."<br>";} 
if($errors->first('password')){$output.=$errors->first('password')."<br>";} 

if($output<>""){
echo "<script>alertify.alert('Számlae2','".$output."')</script>";
	
}

?>

<div style='width:400px;margin:auto'>
<form action='{{route("admin.createuserstore")}}' method='post' id='createuserForm' style='margin:15px;'>
{{csrf_field()}}
<table style='width:100%;'>
<tr><td>Név:</td><td><input type='text' id='name' name='name' value='{{old("name")}}' class='form-control'></td></tr>
<tr><td>Email:</td><td><input type='text' id='email' name='email' value='{{old("email")}}' class='form-control'></td></tr>
<tr><td>Jelszó:</td><td><input type='password' id='password' name='password' value='' class='form-control'></td></tr>
<tr><td>Jogkör:</td><td>
    <select id='jogkor' name='jogkor' class='form-control'>
        <option value='user' {{ (old("jogkor") == "user" ? "selected": "") }}>user</option>
        <option value='admin' {{ (old("jogkor") == "admin" ? "selected": "") }}>admin</option>
        <option value='guest' {{ (old("jogkor") == "guest" ? "guest": "") }}>guest</option>
    </select>
</td></tr>
<tr><td>Létrehoz:</td><td><input type='submit' value='Létrehoz!'id='submit' name='submit' class='form-control'></td></tr>
</table>
</form>
</div>
@endsection