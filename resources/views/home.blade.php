@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<form method='post' action="">
{{csrf_field()}}

{{--<center><h1>Availble Tickets</h1><center><br>

<div class="form-group col-md-4">
      <label for=""></label>
      <select name='' class="form-control">
@foreach( ){

<option value="{{}">{{}}
</option>
}
@endforeach


</select>
</div>
<div class="form-group col-md-4">
      <label for=""></label>
      <input type="text" class="form-control" name="date">
    </div>
    <button type="submit" class="btn btn-primary"></button>

</form>

 
<button type="button" class="btn btn-warning"><a href="{{}}"></a></button>

<div class="list-group">
@foreach( )

<li class="list-group-item"><small></small>  <h4>{{}}   <small></small>   <bold> {{}} </bold><small>At</small>     {{$value->date_s}} </h4> <br>
<a href="{{route('add-book',['id'=>$value->id])}}">Book now</a >

<pre><a href="{{}}"></a></pre></li>



@endforeach
</ul>
--}}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
