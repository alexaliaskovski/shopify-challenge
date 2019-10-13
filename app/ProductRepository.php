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
    public function create(array $context)
    {
        // TODO: put validation and some throws here...
        
        return Product::create($context);
    }
}