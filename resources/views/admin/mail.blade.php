@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-picture-o fa-5x">{{$mail->count()}}</i>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                @foreach($mail as $m)
                <div class="col-xs-9 text-right">
                        <div class="huge" style="max-width:500px;">
                            <h3>{{$m->name}}</h3>
                            <h5>{{$m->email}}</h5>
                            <div>
                                {{substr($m->message, 0, 25)}}
                                {{strlen($m->message) > 200 ? "...":""}}
                            </div>
                            <span>{{date('M j, Y ',strtotime($m->created_at))}}</span>
                        </div>
                        <div class="buttons">
                            <a href="mail/{{$m->id}}/show" class="btn btn-info">Show</a>
                            <a href="mail/{{$m->id}}/replay" class="btn btn-success">Replay</a>
                            <a href="mail/{{$m->id}}/delete" class="btn btn-danger">Delete</a>
                        </div>
                        {!! $mail->links() !!}
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
   </div>
</div>
@endsection