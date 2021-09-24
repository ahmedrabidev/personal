@extends('layouts.master')
@section('title')

@endsection
@section('css')
@endsection
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">
                    {{trans('dashboard.users_page')}}
                </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('dashboard.add_user')}}</span>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="col-lg-12 margin-tb text-left">
    <div class="pull-right">
        <a class="btn btn-sm btn-danger" href="{{ route('users.index') }}">
            {{trans('dashboard.back_btn')}}
        </a>
    </div>
</div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="container">
    <div class="row">
        <form action="{{route('users.store')}}" method="post" style="width: 100%">
            @csrf
                <div class="form-group">
                    <label>{{trans('register.NAME_lABEL')}}</label>
                    <input required name="name" class="form-control" placeholder="{{trans('register.NAME_ENTER')}}">
                </div>
                <div class="form-group">
                    <label>{{trans('register.EMAIL_lABEL')}}</label>
                    <input required name="email" type="email" class="form-control" placeholder="{{trans('register.EMAIL_ENTER')}}">
                </div>
            <div class="form-group">
                <label>{{trans('register.PASSWORD_lABEL')}}</label>
                <input required name="password" class="form-control" placeholder="{{trans('register.PASSWORD_ENTER')}}">
            </div>
            <div class="form-group">
                <label>{{trans('register.CONFIRM_lABEL')}}</label>
                <input required name="password_confirmation" class="form-control" placeholder="{{trans('register.PASSWORD_CONFIRM')}}">
            </div>
            <div class="form-group">
                <label>{{trans('dashboard.roles_page')}}</label>
                <div class="row">
                    @foreach($roles as $role)
                        <div class="col-xl-12">
                           <div class="show_col_checkbox">
                               <label class="ckbox">
                                   <input type="checkbox" name="roles[]" value="{{$role->name}}">
                                   <span>{{$role->name}}</span>
                               </label>
                           </div>
                        </div>
                    @endforeach
                </div>
            </div>
                <div class="text-center">
                    <button class="btn ripple btn-primary" type="submit">
                        {{trans('register.Register_BTN')}}
                    </button>
                </div>
            <br>
        </form>
    </div>
</div>
@endsection
