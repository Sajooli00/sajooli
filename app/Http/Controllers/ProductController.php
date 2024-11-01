<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function seyhello()
    {
        return 'hi';
    }
    public function StoreProduct(StoreProductRequest $storeProductRequest)
    {
        Product::create([
            'title'=>$storeProductRequest->title,
            'name'=>$storeProductRequest->name,
            'price'=>$storeProductRequest->price,
        ]);

    }
}
