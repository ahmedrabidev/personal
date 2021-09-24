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
                    {{trans('dashboard.roles_page')}}
                </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('dashboard.update_user_type')}}</span>
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
        <form action="{{route('roles.update',$role->id)}}" method="post" style="width: 100%">
            @method('PATCH')
            @csrf
            <input type="hidden" value="{{$role->id}}" name="id">
                <div class="form-group">
                    <label>{{trans('input.name')}}</label>
                    <input required name="name" value="{{$role->name}}" class="form-control" placeholder="{{trans('input.name')}}">
                </div>
            <div class="form-group">
                <label>{{trans('dashboard.permissions_page')}}</label>
                <div class="row">
                    @foreach($permissions_all as $permission)
                        @php
                        $checked = "";
                        @endphp
                        @if(in_array($permission->name,$permissions_checked))
                            @php
                                $checked = "checked"
                            @endphp
                            @endif
                        <div class="col-lg-3 col-md-4 col-sm-12">
                           <div class="show_col_checkbox">
                               <label class="ckbox">
                                   <input {{$checked}} type="checkbox" name="permission[]" value="{{$permission->name}}">
                                   <span>{{$permission->trans}}</span>
                               </label>
                           </div>
                        </div>
                    @endforeach
                </div>
            </div>
                <div class="text-center">
                    <button class="btn ripple btn-success" type="submit">
                        {{trans('input.save_btn')}}
                    </button>
                </div>
            <br>
        </form>
    </div>
</div>
@endsection
