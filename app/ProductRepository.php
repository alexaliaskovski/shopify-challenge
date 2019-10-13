<?php

namespace App;

use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ProductRepository
{
    /**
     * Creates a new product model to add to database.
     * 
     * @param array $contect
     */
    public function create(Request $request)
    {
        return Product::create([
            "name" => $request->json()->get('name'),
            "price" => $request->json()->get('price'),
            "discount" => $request->json()->get('discount'),
            "quantity_stocked" => $request->json()->get('quantity_stocked'),
            "quantity_sold" => $request->json()->get('quantity_sold'),
        ]);
    }
}