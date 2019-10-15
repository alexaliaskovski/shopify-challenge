<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\StoreService;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var StoreService
     */
    protected $storeService;

    /**
     * Constructor for ProductController.
     * 
     * @param StoreService $storeService
     */
    public function __construct(
        StoreService $storeService
    ){
        $this->storeService = $storeService;
    }

    /**
     * Add a new product to database.
     * 
     * @param Request $request
     * @return Response
     */
    public function addProduct(Request $request)
    {
        if (Product::where('name', $request->json()->get('name'))->exists()) {
            return response()->json(['message' => "A product by that name already exists."], 409);
        }

        // TODO: complete this exception handling properly. currently assumes something may be thrown, but I haven't configured any throwing...
        try {    
            $product = $this->storeService->addProduct($request);
            return response()->json($product, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 409);
        }
    }

    /**
     * Removes a product from the database by unique uuid.
     * 
     * @param Request $request
     * @param string $uuid
     * @return Reponse
     */
    public function deleteProduct(Request $request, string $uuid)
    {
        try {
            $image = $this->storeService->deleteProduct($request, $uuid);
            return response()->json($image, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 409);
        }
    }

    /**
     * 'Sell' a cart-worth of products.
     * 
     * @param Request $request
     * @return Response
     */
    public function sellCart(Request $request)
    {
        try {
            $cart = $this->storeService->sellCart($request);
            return response()->json($cart, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 409);
        }
    }
}