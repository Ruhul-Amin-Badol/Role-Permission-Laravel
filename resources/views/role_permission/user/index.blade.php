@extends('layouts.master')
@section('content')
    {{-- <div class="content-header"> --}}
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User</h1>
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

    <div class="container mt-3">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-md-12 mt-3">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h4>Users</h4>
                        <div>
                            <a href="{{ route('users.create') }}" class="btn btn-primary float-end">Add User <i
                                    class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-stripe">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $roles)
                                                    <label class="badge bg-primary mx-1">{{ $roles }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @can('Update user')
                                                <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn btn-success"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                            @endcan
                                            @can('Delete user')
                                                <a href="{{ url('users/' . $user->id . '/delete') }}"class="btn btn-danger"><i
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
        </div>
    </div>
@endsection
