@extends('admin.layouts.app')
@section('content')
  @if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
@if(count($errors) > 0)
 <div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
 </div>
</div>
@endif
<form class="form-horizontal"  
                  action="{{url('team/'.$team->id.'/update')}}" 
                  method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" value="{{$team->name}}" class="form-control" id="name" placeholder="Enter Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="job">Job</label>
                    <div class="col-sm-10">
                      <input type="text" name="job" value="{{$team->job}}" class="form-control" id="job" placeholder="Enter Job">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-sm-2" for="flink">Facebook</label>
                    <div class="col-sm-10">
                      <input type="text" name="flink" value="{{$team->flink}}" class="form-control" id="flink" placeholder="Enter Facebook Link">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="tlink">Twitter</label>
                    <div class="col-sm-10">
                      <input type="text" name="tlink" value="{{$team->tlink}}" class="form-control" id="tlink" placeholder="Enter Twitter Link">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="inlink">Linked In</label>
                    <div class="col-sm-10">
                      <input type="text" name="inlink" value="{{$team->inlink}}" class="form-control" id="inlink" placeholder="Enter Linkedin Link">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="teamimage">Image</label>
                    <div class="col-sm-10"> 
                      <input type="file" value="{{$team->teamimage}}" name="teamimage" class="form-control" id="teamimage" />
                    </div>
                  </div>
                  <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Add New Service</button>
                    </div>
                  </div>
                  <input type="hidden" value="{{Session::token()}}" name="_token">
            </form>
</div>
@endsection