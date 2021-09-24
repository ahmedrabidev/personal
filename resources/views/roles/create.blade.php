@extends('layouts.master')
@section('title')
    أضافة مستخدم جديد
@endsection
@section('css')
@endsection
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">
                    {{trans('dashboard.roles_page')}}
                </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('dashboard.add_user_type')}}</span>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="col-lg-12 margin-tb text-left">
    <div class="pull-right">
        <a class="btn btn-sm btn-danger" href="{{ route('roles.index') }}">
            {{trans('dashboard.back_btn')}}
        </a>
    </div>
</div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="container">
    <div class="row">
        <form action="{{route('roles.store')}}" method="post" style="width: 100%">
            @csrf
                <div class="form-group">
                    <label>{{trans('input.name')}}</label>
                    <input required name="name" class="form-control" placeholder="{{trans('input.name')}}">
                </div>
            <div class="form-group">
                <label>{{trans('dashboard.permissions_page')}}</label>
                <div class="row">
                    @foreach($permissions as $permission)
                        <div class="col-lg-3 col-md-4 col-sm-12">
                           <div class="show_col_checkbox">
                               <label class="ckbox">
                                   <input type="checkbox" name="permission[]" value="{{$permission->name}}">
                                   <span>{{$permission->trans}}</span>
                               </label>
                           </div>
                        </div>
                    @endforeach
                </div>
            </div>
                <div class="text-center">
                    <button class="btn ripple btn-primary" type="submit">
                        {{trans('input.add_btn')}}
                    </button>
                </div>
            <br>
        </form>
    </div>
</div>
@endsection
