@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Languages</h1>
@stop

@section('content')
<div>
   <a style="margin: 19px;" href="{{ route('languages.create')}}" class="btn btn-primary">New language</a>
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
  <td>Language</td>
  <td>Code</td>
  <td colspan = 2>Actions</td>
</tr>
</thead>
<tbody>
@foreach($languages as $language)
<tr>
    <td>{{$language->id}}</td>
    <td>{{$language->language}}</td>
    <td>{{$language->code}}</td>
    <td>
        <a href="{{ route('languages.edit',$language->id)}}" class="btn btn-primary">Edit</a>
    </td>
    <td>
        <form action="{{ route('languages.destroy', $language->id)}}" method="post">
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
