@extends('layout')
@section('content')
<h1 style='text-align:center;margin-top:100px'>Felhasználó karbantartása</h1>
<div style='width:400px;margin:auto'>
<form action='{{route("admin.manageuserselect")}}' method='post' id='manageuserselectForm' style='margin:15px;'>
{{csrf_field()}}
<select id='users' name='users' class='form-control'>
@foreach($users as $user)
<option value='{{$user->id}}'>{{$user->name}}</option>
@endforeach
</select>
<input type='submit' value='Kiválaszt!'id='submit' name='submit' class='form-control'>
</form>
</div>
@endsection