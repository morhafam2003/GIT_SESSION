<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // دالة index لعرض جميع المنتجات
    public function index()
{
    $products = Product::all();
    return view('customer.products', compact('products'));
}

}
