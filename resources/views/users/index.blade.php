@extends('layouts.master')
@section('css')
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('dashboard.users_page')}}</h4>
            </div>
            <br>
            <div class="d-flex">
                @can('add users')
                    <a class="btn btn-sm btn-success btn-block" href="{{route('users.create')}}">
                        <i class="fa fa-plus"></i>
                        {{trans('dashboard.add_user')}}
                    </a>
                @endcan
                @can('delete users')
                        <div class="modal main-model" id="delete_modal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <form action="users/destroy" method="post">
                                        @method('Delete')
                                        @csrf
                                        <div class="modal-header">
                                            <h6 class="modal-title text-center">{{trans('dashboard.delete_user')}}</h6>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" id="id">
                                            <div class="form-group">
                                                <label>{{trans('input.name_title')}}</label>
                                                <input readonly name="name" id="name" class="form-control" placeholder="{{trans('input.name')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{trans('register.EMAIL_lABEL')}}</label>
                                                <input readonly name="email" id="email" class="form-control" placeholder="{{trans('register.EMAIL_lABEL')}}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple btn-danger" type="submit">
                                                {{trans('input.delete_btn')}}
                                            </button>
                                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">
                                                {{trans('input.close_btn')}}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                @endcan
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @can('table users')
                <div class="row">
                    <div class="card-body">
                        <div class="main-table">
                            <table class="table text-md-nowrap" id="example2">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">{{trans('table.name')}}</th>
                                    <th class="wd-15p border-bottom-0">{{trans('table.email')}}</th>
                                    <th class="wd-15p border-bottom-0">{{trans('table.user_type')}}</th>
                                    <th class="wd-20p border-bottom-0">{{trans('table.created_at')}}</th>
                                    @can('process users')
                                        <th class="wd-10p border-bottom-0">{{trans('table.process')}}</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                ?>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @foreach($user->getRoleNames() as $role)
                                                <label class="badge badge-success">{{ $role }}</label>
                                            @endforeach
                                        </td>
                                        <td>{{date('d-m-Y', strtotime($user->created_at))}}</td>
                                        @can('process users')
                                            <td>
                                                <div>
                                                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-sm btn-primary"
                                                            data-toggle="dropdown" id="dropdownMenuButton" type="button">
                                                        {{trans('table.process')}}
                                                        <i class="fas fa-caret-down ml-1"></i>
                                                    </button>
                                                    <div  class="dropdown-menu tx-13">
                                                        @can('delete users')
                                                            <a class="dropdown-item delete-btn"
                                                               data-effect="effect-newspaper"
                                                               data-toggle="modal"
                                                               data-id="{{$user->id}}"
                                                               data-name="{{$user->name}}"
                                                               data-email="{{$user->email}}"
                                                               href="#delete_modal" >
                                                                <i class="fas fa-trash-alt"></i>
                                                                {{trans('table.delete')}}
                                                            </a>
                                                        @endcan
                                                        @can('update users')
                                                                <a class="dropdown-item update-btn"
                                                                   href="{{ route('users.edit', $user->id) }}">
                                                                    <i class="fas fa-edit"></i>
                                                                    {{trans('table.update')}}
                                                                </a>
                                                        @endcan
                                                        @can('direct_permission_page users')
                                                                <a class="dropdown-item direct-btn"
                                                                   href="{{ route('add_user_permission',$user->id) }}">
                                                                    <i class="fas fa-edit"></i>
                                                                    {{trans('table.direct_permission')}}
                                                                </a>
                                                        @endcan

                                                    </div>
                                                </div>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        @endcan
    </div>
@endsection
@section('js')
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>
    <script>
        $('#delete_modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name     = button.data('name')
            var email     = button.data('email')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #email').val(email);
        })
    </script>
@endsection
