<?php

namespace App\Repositories;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $productId = Product::where('name', $context['product_name'])
            ->firstOrFail()->product_id;

        $context['product_id'] = $productId;

        return Image::create($context);
    }

    /**
     * Find image by unique uuid.
     * 
     * @param string $imageUuid
     * @return Image
     */
    public function findById(string $imageUuid)
    {
        $image = Image::findOrFail($imageUuid);
        return $image;
    }

    /**
     * Update image data by unique uuid.
     * 
     * @param string $imageUuid
     * @param array $context
     * @return Image
     */
    public function updateById(string $imageUuid, array $context)
    {
        $image = Image::findOrFail($imageUuid);
        $image->update($context);
        return $image;
    }

    /**
     * Detroy image data by unique uuid.
     * 
     * @param string imageUuid
     * @return bool
     */
    public function destroyById(string $imageUuid)
    {
        $image = Image::findOrFail($imageUuid);
        return $image->delete();
    }

    /**
     * Find product associated to image by unique uuid.
     * 
     * @param string $imageUuid
     * @return Product
     */
    public function findProductByImageId(string $imageUuid)
    {
        $image = Image::findOrFail($imageUuid);
        $product = $image->product;
        return $product;
    }
}