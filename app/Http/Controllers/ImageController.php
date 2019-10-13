<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ImageRepository;
use App\Models\Image;
use App\Models\Product;
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
        // TODO: complete this exception handling properly. currently assumes something may be thrown, but I haven't configured any throwing...
        try {
            $image = $this->imageRepository->create($request->all());
            return response()->json($image, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 409);
        }
    }
}