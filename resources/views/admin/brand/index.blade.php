@extends('admin.layouts.app')
@section('content')
<div class="container col-md-12">
	<div class="text-center">
	<a href="{{route('brand.create')}}" class="btn btn-info btn-lg">Add New Brand</a>
</div>
@foreach($brand as $p)
<div class="col-md-12">
  <div>
    <img width="400" height="200" src="{{url('public/images/brand/'.$p->brandimage)}}"> 
  </div>
  <div>{{date('M j, Y ',strtotime($p->created_at))}}</div>
  @if($p->active == 0)
  <div class="col-md-4">
    <a href="brand/{{$p->id}}/active" class="btn btn-success">Active</a>
  </div>
  @else
  <div class="col-md-4">
    <a href="brand/{{$p->id}}/noactive" class="btn btn-success">No Actine</a>
  </div>
  @endif
  <div class="col-md-4">
    <a href="brand/{{$p->id}}/delete" class="btn btn-danger">Delete</a>
  </div>
</div>
@endforeach
</div>
@endsection