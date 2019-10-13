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
     * 
     * @param array $context
     */
    public function create(Request $request)
    {
        // checks if product the user wants to add an image to exists.
        try {
            $productId = Product::where('name', $request->json()->get('product_name'))
                ->firstOrFail()->product_id;
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }

        $url = $request->json()->get('url');
        $name = $request->json()->get('name');
        $alt_text = $request->json()->get('alt_text');

        // checks if user provided an image URL.
        if (!$url) { return response()->json(['message' => 'No image URL provided.'], 400); } 

        return Image::create([
            "product_id" => $productId,
            "name" => $name,
            "url" => $url,
            "alt_text" => $alt_text,
        ]);
    }
}