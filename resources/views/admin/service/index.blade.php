@extends('admin.layouts.app')
@section('content')
<div class="container col-md-12">
	<div class="text-center">
	<a href="{{route('service.create')}}" class="btn btn-info btn-lg">Add New Service</a>
</div>
@foreach($services as $service)
<div class="col-md-12">
  <div>{{$service->heading}}</div>
  <div>{{$service->body}}</div>
  <div>{{date('M j, Y ',strtotime($service->created_at))}}</div>
  @if($service->active == 0)
  <div class="col-md-4">
    <a href="service/{{$service->id}}/active" class="btn btn-success">Active</a>
  </div>
  @else
  <div class="col-md-4">
    <a href="service/{{$service->id}}/noactive" class="btn btn-success">No Actine</a>
  </div>
  @endif
  <div class="col-md-4">
    <a href="service/{{$service->id}}/edit" class="btn btn-info">Edit</a>
  </div>
  <div class="col-md-4">
    <a href="service/{{$service->id}}/delete" class="btn btn-danger">Delete</a>
  </div>
</div>
@endforeach
</div>
@endsection