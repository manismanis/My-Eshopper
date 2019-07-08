<?php

use Illuminate\Support\Facades\Auth;

?>
@section('header')
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>eShopper-Online Shopping </title>
    {{--to add browser-tab icon--}}
    <link rel="shortcut icon" type="image/x-icon" href="{{url('uploads/images/extra/bag.png')}}">
    <link href="{{url('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/responsive.css')}}" rel="stylesheet">
    <script src="{{url('frontend/js/html5shiv.js')}}"></script>
    <script src="{{url('frontend/js/respond.min.js')}}"></script>
</head><!--/head-->
<body>

@endsection