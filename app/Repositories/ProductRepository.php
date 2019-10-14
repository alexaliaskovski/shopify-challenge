<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Image;

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

    /**
     * Find product by unique uuid.
     * 
     * @param string $productUuid
     * @return Product
     */
    public function findById(string $productUuid)
    {
        $product = Product::findOrFail($productUuid);
        return $product;
    }

    /**
     * Update product data by unique uuid.
     * 
     * @param string $productUuid
     * @param array $context
     * @return Product
     */
    public function updateById(string $productUuid, array $context)
    {
        $product = Product::findOrFail($productUuid);
        $product->update($context);
        return $product;
    }

    /**
     * Detroy product data by unique uuid.
     * 
     * @param string productUuid
     * @return bool
     */
    public function destroyById(string $productUuid)
    {
        $product = Product::findOrFail($productUuid);

        // destroy all images associated to product as well.
        $images = $this->findImagesByProductId($productUuid);
        $images = $images->map(function($image) {
            return $image->image_id;
        });
        Image::destroy($images->toArray());
        
        return $product->delete();
    }

    /**
     * Find product associated to image by unique uuid.
     * 
     * @param string $productUuid
     * @return array
     */
    public function findImagesByProductId(string $productUuid)
    {
        $product = Product::findOrFail($productUuid);
        $images = $product->images()->getResults();
        return $images;
    }
}