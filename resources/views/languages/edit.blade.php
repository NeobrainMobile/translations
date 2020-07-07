@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Language</h1>
@stop

@section('content')
@if ($errors->any())
 <div class="alert alert-danger">
   <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
   </ul>
 </div><br />
@endif

<form method="post" action="{{ route('languages.update', $language->id) }}">
            @method('PATCH')
            @csrf
      <div class="form-group">
          <label for="language">Language:</label>
          <input type="text" class="form-control" name="language" value="{{ $language->language }}"/>
      </div>

      <div class="form-group">
          <label for="code">Code:</label>
          <input type="text" class="form-control" name="code" value="{{ $language->code }}"/>
      </div>
      <button type="submit" class="btn btn-primary-outline">Update</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


@stop
