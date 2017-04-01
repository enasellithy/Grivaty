<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@if(!empty($title)) {{$title}} @endif</title>

    <!-- Bootstrap Core CSS -->
{!! Html::style('public/admin/vendor/bootstrap/css/bootstrap.min.css') !!}

    <!-- MetisMenu CSS -->
{!! Html::style('public/admin/vendor/metisMenu/metisMenu.min.css') !!}

    <!-- Custom CSS -->
{!! Html::style('public/admin/dist/css/sb-admin-2.css') !!}

    <!-- Morris Charts CSS -->
{!! Html::style('public/admin/vendor/morrisjs/morris.css') !!}

    <!-- Custom Fonts -->
{!! Html::style('public/admin/vendor/font-awesome/css/font-awesome.min.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
@yield('css')
</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">Website</a>
            </div>
            <!-- /.navbar-header -->