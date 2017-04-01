@extends('admin.layouts.app')
@section('content')
<div class="container col-md-12">
  <div class="text-center">
  <a href="{{route('team.create')}}" class="btn btn-info btn-lg">Add New Team</a>
</div>
@foreach($team as $t)
<div class="col-md-12">
  <div>
    <img src="{{url('public/images/team/'.$t->teamimage)}}">
  </div>
  <div>{{$t->name}}</div>
  <div>{{$t->job}}</div>
  <div>{{$t->flink}}</div>
  <div>{{$t->tlink}}</div>
  <div>{{$t->inlink}}</div>
  <div>{{date('M j, Y ',strtotime($t->created_at))}}</div>
  @if($t->active == 0)
  <div class="col-md-4">
    <a href="team/{{$t->id}}/active" class="btn btn-success">Active</a>
  </div>
  @else
  <div class="col-md-4">
    <a href="team/{{$t->id}}/noactive" class="btn btn-success">No Actine</a>
  </div>
  @endif
  <div class="col-md-4">
    <a href="team/{{$t->id}}/edit" class="btn btn-info">Edit</a>
  </div>
  <div class="col-md-4">
    <a href="team/{{$t->id}}/delete" class="btn btn-danger">Delete</a>
  </div>
</div>
@endforeach
</div>
@endsection