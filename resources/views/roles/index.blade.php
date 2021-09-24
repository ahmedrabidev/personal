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
                <h4 class="content-title mb-0 my-auto">{{trans('dashboard.roles_page')}}</h4>
            </div>
            <br>
            <div class="d-flex">
                @can('add roles')
                    <a class="btn btn-sm btn-success btn-block" href="{{route('roles.create')}}">
                        <i class="fa fa-plus"></i>
                        {{trans('dashboard.add_user_type')}}
                    </a>
                @endcan
                @can('delete roles')
                        <div class="modal main-model" id="delete_modal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <form action="roles/destroy" method="post">
                                        @method('Delete')
                                        @csrf
                                        <div class="modal-header">
                                            <h6 class="modal-title text-center">{{trans('dashboard.delete_user_type')}}</h6>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" id="id">
                                            <div class="form-group">
                                                <label>{{trans('input.name_title')}}</label>
                                                <input readonly name="name" id="name" class="form-control" placeholder="{{trans('input.name')}}">
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
        @can('table roles')
                <div class="row">
                    <div class="card-body">
                        <div class="main-table">
                            <table class="table text-md-nowrap" id="example2">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">{{trans('table.name')}}</th>
                                    <th class="wd-20p border-bottom-0">{{trans('table.created_at')}}</th>
                                    <th class="wd-15p border-bottom-0">{{trans('table.updated_at')}}</th>
                                    @can('process roles')
                                        <th class="wd-10p border-bottom-0">{{trans('table.process')}}</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                ?>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{date('d-m-Y', strtotime($role->created_at))}}</td>
                                        <td>{{date('d-m-Y', strtotime($role->updated_at))}}</td>
                                        @can('process roles')
                                            <td>
                                                <div>
                                                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-sm btn-primary"
                                                            data-toggle="dropdown" id="dropdownMenuButton" type="button">
                                                        {{trans('table.process')}}
                                                        <i class="fas fa-caret-down ml-1"></i>
                                                    </button>
                                                    <div  class="dropdown-menu tx-13">
                                                        @can('delete roles')
                                                            <a class="dropdown-item delete-btn"
                                                               data-effect="effect-newspaper"
                                                               data-toggle="modal"
                                                               data-id="{{$role->id}}"
                                                               data-name="{{$role->name}}"
                                                               href="#delete_modal" >
                                                                <i class="fas fa-trash-alt"></i>
                                                                {{trans('table.delete')}}
                                                            </a>
                                                        @endcan
                                                        @can('update roles')
                                                            <a class="dropdown-item update-btn"
                                                           href="{{ route('roles.edit', $role->id) }}">
                                                            <i class="fas fa-edit"></i>
                                                            {{trans('table.update')}}
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
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>
@endsection
