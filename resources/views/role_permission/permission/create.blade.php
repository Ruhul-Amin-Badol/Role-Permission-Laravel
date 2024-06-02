@extends('layouts.master')
@section('content')
    @include('role_permission.nav-link')

    <div class="col-md-12 mt-3">
        <div class="card shadow-lg">
            <div class="card-header">
                <h4>Create Permission</h4>
                <div>
                    <a href="{{ url('permission') }}" class="btn btn-danger float-end">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('permission.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Permission Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
