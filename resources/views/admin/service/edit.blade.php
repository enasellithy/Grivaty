@extends('admin.layouts.app')
@section('content')
<div class="row">
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
<div class="col-lg-12 col-md-12">
        <form class="form-horizontal"  
                  action="{{url('service/'.$service->id.'/update')}}" 
                  method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="heading">Heading</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{$service->heading}}" name="heading" class="form-control" id="heading" placeholder="Enter Heading">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="body">Body</label>
                    <div class="col-sm-10"> 
                      <textarea class="form-control" name="body" id="body" rows="15">
                        {{$service->body}}
                      </textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="simage">Image Service</label>
                    <div class="col-sm-10"> 
                      <input type="file" name="simage" class="form-control" id="simage" />
                    </div>
                  </div>
                  <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Add New Slider</button>
                    </div>
                  </div>
                  <input type="hidden" value="{{Session::token()}}" name="_token">
            </form>
    </div>
@endsection