@extends('layouts.master')
@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card shadow-lg ">
                    <div class="card-header">
                        <h4>Role:{{ $role->name }}</h4>
                        <div>
                            <a href="{{ url('roles') }}" class="btn btn-danger float-end">Back <i class="fa-solid fa-arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('roles/' . $role->id . '/give-permission') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                @error('permission')
                                    <span class="text-denger">{{ $message }}</span>
                                @enderror
                                <label for="" class="mb-3 fw-bold-lg">Permission Name</label>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="col-md-2">
                                            <label>
                                                <input type="checkbox" name="permission[]" value="{{ $permission->name }}"
                                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }} />
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
