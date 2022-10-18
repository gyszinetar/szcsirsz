<!DOCTYPE html PUBLIC "-//IETF//DTD HTML 2.0//EN">
<HTML>
   <HEAD>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


	<!-- jQuery -->
   <!-- <script src="{{ URL::asset('/js/jquery-latest.min.js') }}"></script>-->
     
	
	
	<script src="{{ URL::asset('/js/alertify.js') }}"></script>
	<!-- <script src="{{ URL::asset('/js/jquery-3.1.1.js') }}"></script> -->
	<script src="{{ URL::asset('/js/jquery-1.12.4.js') }}"></script>
	<script src="{{ URL::asset('/js/jquery-ui.js') }}"></script>
	<link rel="stylesheet" href="{{ URL::asset('/css/alertify.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/jquery-ui.css') }}">
	
	<!-- MenuMaker Plugin -->
<script src="https://s3.amazonaws.com/menumaker/menumaker.min.js"></script>

<!-- Icon Library -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ URL::asset('/css/menu.css') }}">
      <TITLE>
         
      </TITLE>
	  <STYLE>
	  #cssmenu {position:fixed;top:0px;}
#indextabla{position:absolute;top:50px;}
.form-error {border: 2px solid #e74c3c;}
a{
   text-decoration:none;
   color:blue;
   cursor:pointer;
}

#szamlacreatediv{
    top:150px;
    left:25%;
	display:none;
	position:absolute;
	z-index :150;
	background:green;
	width:600px;
	height:150px;
	padding:20px; 
   border: 4px double black;  
  }
	  @yield('style')
	  </STYLE>
	  
   </HEAD>
<BODY>
@if(\Auth::user())

 <div id="cssmenu" style='z-index:10;width:100%' >
  <ul>
     <li><a href="{{route('wellcome.index')}}"  id="">Program</a></li>

     <li><a href=""  id="">IRSZ</a>
        <ul>
        <li><a href="{{route('irsz.index')}}"  id="">Feltöltés</a></li>
        <li><a href="{{route('irsz.export')}}"  id="">Export</a></li>
        </ul>
     </li>
     
    <li><a href=""  id="">{{\Auth::user()->name}}</a>
        <ul>
           <li><a href="{{route('login.changepassword')}}" id="">Jelszó megváltoztatása</a></li>
         @if(\Auth::user()->jogkor=='admin')
		   <li><a href="{{route('admin.createuser')}}">Felhasználó létrehozása</a></li>
		   <li><a href="{{route('admin.manageuser')}}">Felhasználó karbantartása</a></li>
		   @endif  
           <li><a href="{{route('login.logout')}}" id="">Kilépés</a></li>
        </ul>
     </li>

     <li><a id="time">3600</a></li>
     </ul>
</div>
@endif   
  
     
	 
<div id='grey' style='opacity:0.4;display:none;width:100%;height:100%;background:grey;z-index:10;position:fixed;top:0px;left:0px'></div>
<div id='waiting' class='waiting' style='display:none'><img style='position:fixed;top:50%;left:50%;z-index:50' class='waitingpic' src='{{asset("pics/waiting.gif")}}' ></div>
@yield('content')
 
</BODY>
@yield('script')

<script>



if(document.getElementById('indextabla')){
var width = document.getElementById('indextabla').offsetWidth;
document.getElementById('cssmenu').style.width=width+"px";
}
 $("#cssmenu").menumaker({
    title: "Menu",
    breakpoint: 768,
    format: "multitoggle"
});
 
</script>
@if(\Auth::user())
<script>
    var Logouttimer=3600000;
    if (parseInt(document.getElementById('time').innerHTML) > 0) {
    document.getElementById('time').innerHTML=Logouttimer/1000;}
    
    function when(){
    time=document.getElementById('time').innerHTML;
    document.getElementById('time').innerHTML=(parseInt(document.getElementById('time').innerHTML)*1000-1000)/1000;
    if(time==1){
      url='{{ route("login.logout") }}';
      window.location.href=url;
    }
    }

    Logout2 = setInterval(when, 1000);
    </script>
    @endif
</HTML>