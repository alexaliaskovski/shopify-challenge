<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        $product = $this->productRepository->create([
            "name" => $request->json()->get('name'),
            "price" => $request->json()->get('price'),
            "discount" => $request->json()->get('discount'),
            "quantity_stocked" => $request->json()->get('quantity_stocked'),
            "quantity_sold" => $request->json()->get('quantity_sold'),
        ]);

        return response()->json($product, 200);
    }
}