<?php

namespace App;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Exception;

class ImageRepository
{
    /**
     * Creates a new image model to add to database.
     * ASSUMES ALL REQUIRED FIELDS ARE PROVIDED. TODO: VALIDATION
     * 
     * @param array $context
     */
    public function create(array $context)
    {
        // TODO: put validation and some throws here...
     
        // checks if product the user wants to add an image to existing product.
        $productId = Product::where('name', $request->json()->get('product_name'))
            ->firstOrFail()->product_id;

        return Image::create($context);
    }
}