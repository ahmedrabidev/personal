@extends('layouts.master2')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <!-- row -->
    <div class="container">
            <div class="login-language">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if(App::getLocale() != $localeCode)
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    @endif
                @endforeach
            </div>
        <div class="row">
            <div class="col">
                <div class="main-login">
                    <div class="card">
                        <div class="card-body">
                            <p class="login-title">{{trans('login.LOGIN_TITLE')}}</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>{{trans('register.EMAIL_lABEL')}}</label>
                                            <input id="email" type="email" placeholder="{{trans('login.EMAIL_ENTER')}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('register.PASSWORD_lABEL')}}</label>
                                            <input id="password" placeholder="{{trans('login.PASSWORD_ENTER')}}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                    @enderror
                                        </div>
                                        <!--<div class="text-left">
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{trans('login.forget_password')}}
                                            </a>
                                        </div>-->
                                        <div class="text-center">
                                            <button class="btn btn-main-primary btn-block" type="submit">
                                                {{trans('login.LOGIN_BTN')}}
                                            </button>
                                        </div>
                                        <!--<p class="text-center or_login_with">
                                            {{trans('login.or_login')}}
                                        </p>
                                        <div class="social-login text-center">
                                            <a href="{{route('login.facebook')}}" class="fb">
                                                <img src="{{URL::asset('assets/img/social/facebook.png')}}" alt="{{trans('login.facebook')}}">
                                            </a>
                                            <a href="{{route('login.google')}}" class="go">
                                                <img src="{{URL::asset('assets/img/social/google.png')}}" alt="{{trans('login.google')}}">
                                            </a>
                                        </div> -->
                                        <!--<p class="text-center or_login_with or_register">
                                            <a href="{{url('register')}}">{{trans('welcome.REGISTER')}}</a>
                                        </p>-->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!--Internal  Select2 js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Form-layouts js -->
    <script src="{{URL::asset('assets/js/form-layouts.js')}}"></script>
@endsection
