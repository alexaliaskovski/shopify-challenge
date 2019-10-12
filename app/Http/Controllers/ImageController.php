<?php

namespace App\Http\Controllers;

use App\User;
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
     * Add a new image to database
     * 
     * @param Request $request
     * @param string $url
     */
    public function addImage(Request $request)
    {
        $image = $this->imageRepository->create([
            "product_id" => $request->json()->get('product_id'),
            "url" => $request->json()->get('url'),
            "alt_text" => $request->json()->get('alt_text'),
        ]);
        
        return response()->json($image, 200);
    }
}