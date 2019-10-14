<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use App\Repositories\ImageRepository;
use App\Services\StoreService;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * @var StoreService
     */
    protected $storeService;

    /**
     * Constructor for ImageController.
     * 
     * @param StoreService $storeService
     */
    public function __construct(
        StoreService $storeService
    ){
        $this->storeService = $storeService;
    }

    /**
     * Add a new image to database.
     * 
     * @param Request $request
     * @param string $url
     * @return Response
     */
    public function addImage(Request $request)
    {
        // TODO: complete this exception handling properly. currently assumes something may be thrown, but I haven't configured any throwing...
        try {
            $image = $this->storeService->addImage($request);
            return response()->json($image, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 409);
        }
    }

    /**
     * Removes an image from the database by unique uuid.
     * 
     * @param Request $request
     * @param string $uuid
     * @return Reponse
     */
    public function deleteImage(Request $request, string $uuid)
    {
        try {
            $image = $this->storeService->deleteImage($request, $uuid);
            return response()->json($image, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 409);
        }
    }
}