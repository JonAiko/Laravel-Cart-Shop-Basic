<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function index(Product $product)
    {
        $products = Product::all();
        return view('pagina.index',compact('products'));
    }
}
