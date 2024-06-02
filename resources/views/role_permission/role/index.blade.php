@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="">Role</h1>
            </div><!-- /.col -->
            {{-- <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Permission</li>
        </ol>
      </div><!-- /.col --> --}}
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    @include('role_permission.nav-link')


    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-header d-flex">
                <h4>Roles</h4>
                <div>
                    <a href="{{ url('roles/create') }}" class="btn btn-primary float-end">Add Role</a>
                </div>


            </div>
            <div class="card-body">
                <table class="table table-hover table-stripe text-dark">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>

                                    <a href="{{ url('roles/' . $role->id . '/give-permission') }}" class="btn btn-info">Add
                                        Permissions <i class="fa-solid fa-plus"></i></a>

                                    @can('Update role')
                                        {{-- @role('SuperAdmin|Admin') --}}
                                        <a href="{{ url('roles/' . $role->id . '/edit') }}" class="btn btn-success"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        {{-- @endrole --}}
                                    @endcan

                                    @can('Delete role')
                                        <a href="{{ url('roles/' . $role->id . '/delete') }}"class="btn btn-danger"><i
                                                class="fa-solid fa-trash"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
