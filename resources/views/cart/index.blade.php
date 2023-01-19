@extends('template')
@section('title') cart-shop @endsection
@section('navbar') @include('layouts.navbar') @endsection
@section('content')
    <div class="container w-75">
        <div class="card my-3" >
            <div class="card-header">
                My cart shop
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                          <th scope="col">Image</th>
                          <th scope="col">Name</th>
                          <th scope="col">Cant</th>
                          <th scope="col">Price</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach (Session::get('cart') as $key => $item )
                        <tr>
                            <th class="w-25"><img src="{{ asset('uploads/img/'.$item['image']) }}" alt="image-product" class="img-fluid w-50"></th>
                            <td>{{ $item['name'] }}</td>
                            <td class="w-25">
                                <form action="{{ route('cart.update', $item['id']) }}" method="POST" autocomplete="off" novalidate class="d-flex gap-2">
                                    @csrf
                                    <input type="number" name="stock_value" class="form-control w-25 text-center" value="{{ $item['stock']}}">
                                    <button  class="btn btn-primary btn-sm">change</button>
                                </form>
                            </td>
                            <td class="h5 t">{{ $item['price']}}</td>
                            <td class="">
                                <form action="{{ route('cart.delkey',$item['id']) }}" method="POST" autocomplete="off" novalidate>
                                    @csrf
                                    <button class="btn btn-danger btn-sm">X</button>
                                </form>
                            </td>
                          </tr>
                        @endforeach

                      </tbody>
                  </table>
                  <div class="container d-flex justify-content-end">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <h5 class="mx-3">Total Quantity:</h5><p class="h3">{{ Session::get('ei-cart')['cant']; }}</p>
                                <p class="card-text mx-3">Final Amount: <h3>${{ Session::get('ei-cart')['amount_final'] }}</h3></p>
                            </div>
                        </div>
                      </div>
                  </div>
                  <form action="{{ route('cart.destroy') }}" method="POST">
                    @csrf
                      <button type="submit" class="btn btn-primary w-100 mt-2">Pagar</button>
                  </form>
            </div>
            <div class="card-footer text-muted">
                Footer
            </div>
        </div>
    </div>
@endsection
