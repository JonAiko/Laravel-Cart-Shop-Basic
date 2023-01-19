@extends('template')
@section('title') Register @endsection
@section('content')
    <div class="container mt-5">
        <div class="card m-auto w-50">
            <div class="card-header">
                <strong>Register</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST" novalidate autocomplete="off">
                    @csrf
                    <!-- name -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="email">Name</span>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Insert Name">
                    </div>
                    <!-- name -->
                    <!-- email -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="email">Email</span>
                        <input type="text" name="email" id="email" class="form-control" placeholder="expample@core.net">
                    </div>
                    <!-- email -->
                    <!-- password-->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="password">Pass</span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="password">
                    </div>
                    <!-- password-->
                    @if (Route::has('users.create'))
                    <div class="mb-3 mt-2 text-muted">
                        Are you have a account?
                        <a href="{{ route('login.index') }}">Login In</a>
                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary w-100">
                        Log in
                    </button>
                </form>
            </div>
            <div class="card-footer text-muted text-center">
                &#169; Derechos Reservados a Cart-Shop-Basic
            </div>
        </div>
    </div>
@endsection
