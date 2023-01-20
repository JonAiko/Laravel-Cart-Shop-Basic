@extends('template')
@section('title') Login @endsection
@section('content')
    <div class="container mt-5">
        <div class="card m-auto w-50">
            <div class="card-header">
                <strong>Log In</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('login.store') }}" method="POST" novalidate autocomplete="off">
                    @csrf
                    <!-- email -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="email">@</span>
                        <input type="text" name="email" id="email" class="form-control" placeholder="expample@core.net">
                    </div>
                    <!-- email -->
                    <!-- password-->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="password">*</span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="password">
                    </div>
                    <!-- password-->
                    @if (Route::has('users.create'))
                    <div class="mb-3 mt-2 text-muted">
                        Aun no tienes cuenta?.
                        <a href="{{ route('users.create') }}"> Registrarse</a>
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
