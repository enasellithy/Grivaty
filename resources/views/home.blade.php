@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact Form</div>

                <div class="panel-body">
            {!! Form::open(array('url'=>'contact/post','method'=>'post')) !!}
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Type Your Name" />
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Type Your Email" />
            </div>
            <div class="form-group">
                <textarea name="message" class="form-control" col="10" rows="3">
                </textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Send" class="btn btn-success btn-block"  />
            </div>
            <input type="hidden" value="{{Session::token()}}" name="_token">
            {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
