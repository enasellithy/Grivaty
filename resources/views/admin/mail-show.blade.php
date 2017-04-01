@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        {{$mail->name}}
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div>{{$mail->email}}</div>
                <div>{{$mail->message}}</div>
                <div>{{$mail->created_at}}</div>
                 <div class="buttons text-center">
                    <a href="mail/{{$mail->id}}/replay" class="btn btn-success">Replay</a>
                    <a href="mail/{{$mail->id}}/delete" class="btn btn-danger">Delete</a>
                 </div>
            </div>
        </div>
    </div>
   </div>
   <a href="{{route('cpanel.index')}}" class="btn btn-primary">Go Back</a>
</div>
@endsection