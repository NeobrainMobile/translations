@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Content</h1>
@stop

@section('content')
<div>
   <a style="margin: 19px;" href="{{ route('strings.create')}}" class="btn btn-primary">New String</a>
</div>
<div>
   <a style="margin: 19px;" href="/content/publish" class="btn btn-primary">Publish</a>
</div>
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
</div>

<table class="table table-striped">
<thead>
<tr>
  <td>id</td>
  <td>String</td>
  <td colspan = 2>Actions</td>
</tr>
</thead>
<tbody>
@foreach($strings as $string)
<tr>
    <td>{{$string->id}}</td>
    <td>{{$string->content}}</td>
    <td>
        <a href="{{ route('strings.edit',$string->id)}}" class="btn btn-primary">Edit</a>
    </td>
    <td>
        <form action="{{ route('strings.destroy', $string->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
