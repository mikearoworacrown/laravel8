@extends('admin.admin_master')

@section('admin')

    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>User Profile Update</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
        @endif
        <div class="card-body">
            <form class="form-pill" method="POST" action="{{ route('update.user.profile') }}">
            @csrf
                <div class="form-group">
                    <label for="exampleFormControlPassword3">User Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user['name'] }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlPassword3">Email Address</label>
                    <input type="email" class="form-control" name="email" value="{{ $user['email'] }}">
                </div>
                <button class="btn btn-primary btn-default" type="sumit">Update</button>
            </form>
        </div>
    </div>

@endsection