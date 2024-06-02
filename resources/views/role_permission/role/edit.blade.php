@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg ">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                <div class="card-header">
                    <h4>Edit Role</h4>
                    <div>
                        <a href="{{ url('roles') }}" class="btn btn-danger float-end">Back <i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('roles/'.$role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Role Name</label>
                            <input type="text" name="name" value="{{$role->name}}" class="form-control"> </div>
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