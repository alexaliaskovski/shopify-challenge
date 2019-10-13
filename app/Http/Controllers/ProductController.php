<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\ProductRepository;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * Constructor for ProductController.
     * 
     * @param ProductRepository $productRepository
     */
    public function __construct(
        ProductRepository $productRepository
    ){
        $this->productRepository = $productRepository;
    }

    /**
     * Add a new product to database.
     * 
     * @param Request $request
     * @param string $url
     */
    public function addProduct(Request $request)
    {
        if (Product::where('name', $request->json()->get('name'))->exists()) {
            return response()->json(['message' => "A product by that name already exists."], 409);
        }

        // TODO: complete this exception handling properly. currently assumes something may be thrown, but I haven't configured any throwing...
        try {    
            $product = $this->productRepository->create($request->all());
            return response()->json($product, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 409);
        }
    }
}