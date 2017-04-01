@extends('admin.layouts.app')
@section('content')
<div class="container col-md-12">
	<div class="text-center">
	<a href="{{route('about.create')}}" class="btn btn-info btn-lg">Add New About</a>
</div>
@foreach($about as $a)
<div class="col-md-12">
  <div>{{$a->pimage}}</div>
  <div>{{$a->title}}</div>
  <div>{{$a->sub_title}}</div>
  <div>{{date('M j, Y ',strtotime($a->created_at))}}</div>
  @if($a->active == 0)
  <div class="col-md-4">
    <a href="about/{{$a->id}}/active" class="btn btn-success">Active</a>
  </div>
  @else
  <div class="col-md-4">
    <a href="about/{{$a->id}}/noactive" class="btn btn-success">No Actine</a>
  </div>
  @endif
  <div class="col-md-4">
    <a href="about/{{$a->id}}/edit" class="btn btn-info">Edit</a>
  </div>
  <div class="col-md-4">
    <a href="about/{{$a->id}}/delete" class="btn btn-danger">Delete</a>
  </div>
</div>
@endforeach
</div>
@endsection