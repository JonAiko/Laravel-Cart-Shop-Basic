@extends('template')
@section('title') Dashboard @endsection

@section('navbar')
    @include('layouts.navbar')
@endsection
@section('content')
    <div class="container-fluid ">
        <div class="row p-3">
            @foreach ($products as $product )
            <div class="col-3">
                <div class="card" style="height: 100%">
                    <div class="card-header">
                        Producto #{{$product->id }}
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('uploads/img/'.$product->image) }}" alt="imagen-producto" class="img-fluid">
                        <p class="card-text text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde, laboriosam.</p>
                        <div class="d-flex justify-content-lg-center inline-block gap-2">
                            <form  method="POST" novalidate autocomplete="off">
                                @csrf
                                <button type="submit" class="btn btn-primary">Informacion</button>
                            </form>
                            <form action="{{ route('cart.store',$product) }}" method="POST" novalidate autocomplete="off">
                                @csrf
                                <button type="submit" class="btn btn-secondary">Comprar</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Zapatillas
                    </div>
                </div>
            </div>
            @endforeach

            {{-- <div class="col-3">
                <div class="card" style="height: 100%">
                    <div class="card-header">
                        Producto #2
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('uploads/img/polera-negra-sublimachile.jpg') }}" alt="imagen-producto" class="img-fluid">
                        <p class="card-text text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde, laboriosam.</p>
                        <div class="d-flex justify-content-lg-center inline-block gap-2">
                            <form  method="POST" novalidate autocomplete="off">
                                @csrf
                                <button type="submit" class="btn btn-primary">Informacion</button>
                            </form>
                            <form  method="POST" novalidate autocomplete="off">
                                @csrf
                                <button type="submit" class="btn btn-secondary">Comprar</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Poleras
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
