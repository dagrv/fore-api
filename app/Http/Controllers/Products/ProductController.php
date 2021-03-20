<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductIndexResource;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $products = Product::paginate(10);

        return ProductIndexResource::collection($products);
    }

    public function show(Product $product) {
        return new ProductResource(
            $product
        );
    }
}