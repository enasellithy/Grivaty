@extends('admin.layouts.app')
@section('content')
<div class="container col-md-12">
	<div class="text-center">
	<a href="{{route('portfolio.create')}}" class="btn btn-info btn-lg">Add New Portfolio</a>
</div>
@foreach($portfolio as $port)
<div class="col-md-12">
  <div>{{$port->title}}</div>
  <div>{{$port->sub_title}}</div>
  <div>{{date('M j, Y ',strtotime($port->created_at))}}</div>
  @if($port->active == 0)
  <div class="col-md-4">
    <a href="portfolio/{{$port->id}}/active" class="btn btn-success">Active</a>
  </div>
  @else
  <div class="col-md-4">
    <a href="portfolio/{{$port->id}}/noactive" class="btn btn-success">No Actine</a>
  </div>
  @endif
  <div class="col-md-4">
    <a href="portfolio/{{$port->id}}/edit" class="btn btn-info">Edit</a>
  </div>
  <div class="col-md-4">
    <a href="portfolio/{{$port->id}}/delete" class="btn btn-danger">Delete</a>
  </div>
</div>
@endforeach
</div>
@endsection