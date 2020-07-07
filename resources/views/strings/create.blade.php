@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Content</h1>
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

<form method="post" action="{{ route('strings.store') }}">
      @csrf
      <div class="form-group">
          <label for="language">Content:</label>
          <input type="text" class="form-control" name="content"/>
      </div>
      @foreach($languages as $language)
        <div class="form-group">
            <label for="code">Content {{$language->language}}:</label>
            <input type="text" class="form-control" name="content_{{$language->id}}"/>
        </div>
      @endforeach

      <button type="submit" class="btn btn-primary-outline">Add Content</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


@stop
