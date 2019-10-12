<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ImageRepository;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    /**
     * Constructor for ImageController.
     * 
     * @param ImageRepository $imageRepository
     */
    public function __construct(
        ImageRepository $imageRepository
    ){
        $this->imageRepository = $imageRepository;
    }

    /**
     * Add a new image to database.
     * 
     * @param Request $request
     * @param string $url
     */
    public function addImage(Request $request)
    {
        // TODO: grab product uuid by finding associated product name
        // ... $productId = ...

        $image = $this->imageRepository->create([
            "product_id" => $productId,
            'name' => $request->json()->get('name'),
            "url" => $request->json()->get('url'),
            "alt_text" => $request->json()->get('alt_text'),
        ]);

        return response()->json($image, 200);
    }
}