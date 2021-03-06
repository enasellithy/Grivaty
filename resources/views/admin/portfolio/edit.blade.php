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
                  action="{{url('portfolio/'.$portfolio->id.'/update')}}" 
                  method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="heading">Heading</label>
                    <div class="col-sm-10">
                      <input type="text" name="heading" value="{{$portfolio->heading}}" class="form-control" id="heading" placeholder="Enter Heading">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="sub_title">Sub Title</label>
                    <div class="col-sm-10">
                      <input type="text" name="sub_title" value="{{$portfolio->sub_title}}" class="form-control" id="sub_title" placeholder="Enter Sub Title">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="body">Body</label>
                    <div class="col-sm-10">
                      <textarea name="body" id="body" class="form-control" col="10" rows="5">
                        {{$portfolio->body}}
                      </textarea>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-sm-2" for="client">Client</label>
                    <div class="col-sm-10">
                      <input type="text" name="client" class="form-control" value="{{$portfolio->client}}" id="client" placeholder="Enter Client">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-sm-2" for="question">Question</label>
                    <div class="col-sm-10">
                      <input type="text" name="question" class="form-control" value="{{$portfolio->question}}" id="question" placeholder="Enter Question">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="pimage">Image Portfolio</label>
                    <div class="col-sm-10"> 
                      <input type="file" name="pimage" class="form-control" id="pimage" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="toggle_image">Image Portfolio Hover</label>
                    <div class="col-sm-10"> 
                      <input type="file" name="toggle_image" class="form-control" id="toggle_image" />
                    </div>
                  </div>
                  <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Edit Portfolio</button>
                    </div>
                  </div>
                  <input type="hidden" value="{{Session::token()}}" name="_token">
            </form>
</div>
@endsection