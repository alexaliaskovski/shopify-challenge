<?php

namespace App;

use App\Product;

class ProductRepository
{
    /**
     * Creates a new product model to add to database.
     * 
     * @param array $contect
     */
    public function create(array $context)
    {
        return Product::create($context);
    }
}