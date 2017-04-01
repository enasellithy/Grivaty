@extends('admin.layouts.app')
@section('content')
<div class="container col-md-12">
	<div class="text-center">
	<a href="{{route('slide.create')}}" class="btn btn-info btn-lg">Add New Slide</a>
</div>
<table class="table table-hover table-condensed table-responsive">
    <thead>
      <tr>
        <th>Title</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>control</th>
      </tr>
    </thead>
    <tbody>
      @foreach($slide as $slid)
      <tr> 
        <td>{{$slid->heading}}</td>
        <td>{{date('M j, Y ',strtotime($slid->created_at))}}</td>
        <td>{{date('M j, Y ',strtotime($slid->updated_at))}}</td>
        <td>
          <a href="slide/{{$slid->id}}/edit">Edit</a>
          <a href="slide/{{$slid->id}}/delete">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection