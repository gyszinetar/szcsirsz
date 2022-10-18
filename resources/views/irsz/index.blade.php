@extends('layout')

@section('content')

<h1 style='text-align:center;margin-top:100px'>Irsz</h1>
<br><br>
<form method="post" action="{{route('irsz.upload')}}" enctype="multipart/form-data">
  {{csrf_field()}}

          <input type="file" name="filename[]" class="form-control" multiple>
        <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>

  </form>  
@endsection
@section('script')
@endsection