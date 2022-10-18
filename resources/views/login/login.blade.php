@extends('layout')
@section('style')
* {
  -webkit-font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

html, body { height: 100%; }
body {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  position: relative;
  
  background: linear-gradient(
    135deg,
    #242e4d,
    #897e79
  );
  font-family: 'Roboto', helvetica, arial, sans-serif;
  font-size: 1.5em;
  
}
body:before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    height: 100%; width: 100%;

    background-image: url(data:image/png;base64,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);
    opacity: .3;
  }
  
.login-form {
  width: 100%;
  padding: 2em;
  position: relative;
  background: rgba(0, 0, 0, 0.15);
} 
  
.login-form:before {
    content: '';
    position: absolute;
    top: -2px; left: 0;
    height: 2px; width: 100%;
    
    background: linear-gradient(
      to right,
	    #35c3c1,
      #00d6b7
    );    
  } 


  .flex-row {
    display: flex;
    margin-bottom: 1em;
  }
  
  .lf--label {
    margin: 0;
    width: 3em;
    display: flex;
    align-items: center;
    justify-content: center;
    
    background: #f5f6f8;
    cursor: pointer;
  }
  .lf--input {
    width:400px;
    flex: 1;
    padding: 1em;
    border: 0;
    color: #8f8f8f;
    font-size: 1rem;

  }

  .lf--submit {
    display: block;
    padding: 1em;
    width: 100%;
    
    background: linear-gradient(
      to right,
      #35c3c1,
      #00d6b7
    );

    border: 0;
    color: #fff;
    cursor: pointer;
    font-size: .75em;
    font-weight: 600;
    text-shadow: 0 1px 0 rgba(black, .2);

  }

::placeholder { color: #8f8f8f; }

@endsection
@section('content')
<div id='time2' style='color: white;width: 100%;'></div>

<?php 
$output="";
if(Session::get('msg')){$output.=Session::get('msg')."<br>";} 

if($output<>""){
echo "<script>alertify.alert('Számlae2','".$output."')</script>";	
}
?>



<?php 
$output="";
if($errors->first('loginemail')){$output.=$errors->first('loginemail')."<br>";} 
if($errors->first('loginpassword')){$output.=$errors->first('loginpassword')."<br>";} 

if($output<>""){
echo "<script>alertify.alert('Számlae2','".$output."')</script>";	
}
?>


<div style='width:400px;margin:auto'>
<form action='{{route("login.dologin")}}' class='login-form' method='post' id='loginForm' >
{{csrf_field()}}
<!--<table style='width:100%;'>
<tr><td>Email:</td><td><input style='width:100%;' type='text' id='loginemail' name='loginemail' value='{{old("loginemail")}}' class='form-control lf--input'> </td></tr>
<tr><td>Jelszó:</td><td><input style='width:100%;' type='password' id='loginpassword' name='loginpassword' value='' class='form-control lf--input'></td></tr>
<tr><td>Belépés:</td><td><input type='submit' style=' width:100%'value='Bejelentkezés!'id='loginsubmit' name='loginsubmit' class='form-control lf--submit'></td></tr>
</table>-->
<div class="flex-row">
    <label class="lf--label" for="username">
      <svg x="0px" y="0px" width="20px" height="20px">
        <path fill="#B1B7C4" d="M17.388,4.751H2.613c-0.213,0-0.389,0.175-0.389,0.389v9.72c0,0.216,0.175,0.389,0.389,0.389h14.775c0.214,0,0.389-0.173,0.389-0.389v-9.72C17.776,4.926,17.602,4.751,17.388,4.751 M16.448,5.53L10,11.984L3.552,5.53H16.448zM3.002,6.081l3.921,3.925l-3.921,3.925V6.081z M3.56,14.471l3.914-3.916l2.253,2.253c0.153,0.153,0.395,0.153,0.548,0l2.253-2.253l3.913,3.916H3.56z M16.999,13.931l-3.921-3.925l3.921-3.925V13.931z"/>
      </svg>
    </label>
    <input id="loginemail" name='loginemail' class='lf--input' placeholder='Email' type='text'>
  </div>
  <div class="flex-row">
    <label class="lf--label" for="password">
      <svg x="0px" y="0px" width="15px" height="5px">
        <g>
          <path fill="#B1B7C4" d="M6,2L6,2c0-1.1-1-2-2.1-2H2.1C1,0,0,0.9,0,2.1v0.8C0,4.1,1,5,2.1,5h1.7C5,5,6,4.1,6,2.9V3h5v1h1V3h1v2h1V3h1 V2H6z M5.1,2.9c0,0.7-0.6,1.2-1.3,1.2H2.1c-0.7,0-1.3-0.6-1.3-1.2V2.1c0-0.7,0.6-1.2,1.3-1.2h1.7c0.7,0,1.3,0.6,1.3,1.2V2.9z"/>
        </g>
      </svg>
    </label>
    <input id="loginpassword" name='loginpassword' class='lf--input' placeholder='Jelszó' type='password'>
  </div>
  <input class='lf--submit' id='loginsubmit' type='submit' value='Bejelentkezés!'>
</form>
</div>
<script>
    var Logouttimer2=3600000;
    if("{{$msg}}"!=0){
    alertify.error("{{$msg}}");
    }
    if ($('#time2').length > 0) {
    document.getElementById('time2').innerHTML=Logouttimer2/1000;}
      
      function when(){
      time2=document.getElementById('time2').innerHTML;
      if ($('#time2').length > 0) {
      document.getElementById('time2').innerHTML=(parseInt(document.getElementById('time2').innerHTML)*1000-1000)/1000;
      }
      if(time2==1){
      url='{{ route("login.login",["msg"=>"Újratöltés"]) }}';
      window.location.href=url;
      }
      }
      
      

    Logout2 = setInterval(when, 1000);
    </script>
@endsection