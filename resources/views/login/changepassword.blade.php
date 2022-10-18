@extends('layout')
@section('content')

<h1 style='text-align:center;margin-top:100px'>Jelszó változtatás</h1>
<?php 
$output="";
if(Session::get('msg')){$output.=Session::get('msg')."<br>";} 

if($output<>""){
echo "<script>alertify.alert('Számlae2','".$output."')</script>";	
}
?>
 
 <?php 
$output="";
if($errors->first('newpassword')){$output.=$errors->first('newpassword')."<br>";} 
if($errors->first('repassword')){$output.=$errors->first('repassword')."<br>";} 

if($output<>""){
echo "<script>alertify.alert('Számlae2','".$output."')</script>";	
}
?>
 
 

<div style='width:400px;margin:auto'>
<form action='{{route("login.dochangepassword")}}' method='post' id='changepasswordForm' >
{{csrf_field()}}
<table style='width:100%;'>
<tr><td>Új Jelszó:</td><td><input style='width:100%;' type='password' id='newpassword' name='newpassword' value=''class='form-control'></td></tr>
<tr><td>Új Jelszó megint:</td><td><input style='width:100%;' type='password' id='repassword' name='repassword' value=''class='form-control'></td></tr>
<tr><td>Változtatás:</td><td><input type='submit' style=' width:100%' value='Változtatás!'id='submit' name='submit'class='form-control'></td></tr>
</table>
</form>
</div>
@endsection