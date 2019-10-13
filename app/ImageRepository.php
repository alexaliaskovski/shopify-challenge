<?php

namespace App;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ImageRepository
{
    /**
     * Creates a new image model to add to database.
     * 
     * @param array $context
     */
    public function create(Request $request)
    {
        // checks if product the user wants to add an image to exists.
        try {
            $productId = Product::where('name', $request->json()->get('product_name'))
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
        
        return Image::create([
            "product_id" => $productId,
            "name" => $request->json()->get('name'),
            "url" => $request->json()->get('url'),
            "alt_text" => $request->json()->get('alt_text'),
        ]);
    }
}