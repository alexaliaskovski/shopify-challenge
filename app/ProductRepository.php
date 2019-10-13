<?php

namespace App;

use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ProductRepository
{
    /**
     * Creates a new product model to add to database.
     * ASSUMES ALL REQUIRED FIELDS ARE PROVIDED. TODO: VALIDATION
     * 
     * @param array $contect
     */
    public function create(Request $request)
    {
        if (Product::where('name', $request->json()->get('product_name'))->exists()) {
            return response()->json(['message' => "A product by that name already exists."], 409);
        }

        $name = $request->json()->get('name');
        $price = $request->json()->get('price');
        $discount = $request->json()->get('discount');
        $quantity_stocked = $request->json()->get('quantity_stocked');
        $quantity_sold = $request->json()->get('quantity_sold');

        if (!$name) { return response()->json(['message' => 'A product name must be declared.'], 400); }
        if (!$price) { return response()->json(['message' => 'A price for this product must be declared.'], 400); }
 
        return Product::create([
            "name" => $name,
            "price" => $price,
            "discount" => $discount,
            "quantity_stocked" => $quantity_stocked,
            "quantity_sold" => $quantity_sold,
        ]); 
    }
}