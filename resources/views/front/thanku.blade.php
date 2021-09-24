@extends('layouts.master2')
@section('title')
    {{trans('front.sent_message_title')}}
@endsection
@section('css')

    <!--- Internal Fontawesome css-->
    <link href="{{URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!---Ionicons css-->
    <link href="{{URL::asset('assets/plugins/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <!---Internal Typicons css-->
    <link href="{{URL::asset('assets/plugins/typicons.font/typicons.css')}}" rel="stylesheet">
    <!---Internal Feather css-->
    <link href="{{URL::asset('assets/plugins/feather/feather.css')}}" rel="stylesheet">
    <!---Internal Falg-icons css-->
    <link href="{{URL::asset('assets/plugins/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
@endsection
@section('content')
     <div class="main-front">
        <div class="thanku_contact">
           <div class="container-fluid">
               <i class="far fa-smile"></i>
               <p>
                   {{trans('front.thanku_contact')}}
               </p>
               <a href="{{URL::to('/')}}" class="btn btn-info-gradient">
                   {{trans('front.home')}}
               </a>
           </div>
        </div>
     </div>
@endsection
@section('js')

@endsection
