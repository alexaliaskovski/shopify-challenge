<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ImageRepository;
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
        // TODO: wrap in try/catch
        

        $image = $this->imageRepository->create($request);

        return response()->json($image, 200);
    }
}