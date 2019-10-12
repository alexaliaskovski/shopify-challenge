<?php

namespace App;

use App\Image;

class ImageRepository
{
    /**
     * Creates a new image model to add to database
     * 
     * @param string url
     */
    public function create(array $context)
    {
        return Image::create($context);
    }
}