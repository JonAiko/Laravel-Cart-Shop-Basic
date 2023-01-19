<nav class="navbar navbar-expand-lg"  style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href=" {{ route('home')}}">C.S</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page">Home</a>
          </li>
          @if (Session::has('cart'))
          @php
            $quantity = 0;
            foreach (Session::get('cart') as $key => $value) {
                $quantity = $quantity + $value['stock'];
            }
          @endphp
          <li class="nav-item">
            <form action="{{ route('cart.index') }}">
                @csrf
                <button class="nav-link border-0" style="filter:brightness(1.1); mix-blend-mode:multiply" >Cart({{$quantity}})</button>
            </form>
          </li>
          @endif
        </ul>
        @if(Auth::check())
        <span class="font-weight-bold mx-2">
            Welcome: {{ auth()->user()->name }}
        </span>
        <form action="{{ route('login.destroy') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">Exit</button>
        </form>
        @else
        <a href="{{ route('users.create') }}" class="btn btn-outline-primary btn-sm mx-3">Register</a>
        <a href="{{ route('login.index')}} "class="btn btn-outline-info btn-sm">Log in</a>
        @endif

      </div>
    </div>
  </nav>
