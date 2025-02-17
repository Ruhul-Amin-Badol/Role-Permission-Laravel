@extends('layouts.master')
@section('content')
    @include('role_permission.nav-link')

    <div class="col-md-12 mt-3">
        <div class="card shadow-lg">
            <div class="card-header">
                <h4>Create User</h4>
                <div>
                    <a href="{{ url('users') }}" class="btn btn-danger float-end">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ url('users/'.$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">User Name</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" readonly value="{{$user->email}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Roles</label>
                        <select name="roles[]" class="form-control" multiple>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{$role}}"
                                {{in_array($role,$userRoles) ? 'selected':''}}
                                >
                                    {{ $role }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
