<?php

namespace App\Services;

use App\Repositories\ImageRepository;
use App\Repositories\ProductRepository;
use Exception;
use Illuminate\Http\Request;

class StoreService
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    /**
     * ProductService constructor.
     * Repositories should be instantiated in the DatabaseServiceProvider.php
     * 
     * @param ProductRepository $productRepository
     * @param ImageRepository $imageRepository
     */
    public function __construct(
        ProductRepository $productRepository,
        ImageRepository $imageRepository
    ){
        $this->productRepository = $productRepository;
        $this->imageRepository = $imageRepository;
    }

    /**
     * Add a new product to database.
     * 
     * @param Request $request
     * @return Product
     */
    public function addProduct(Request $request)
    {
        $product = $this->productRepository->create($request->all());
        return $product;
    }

    /**
     * Add a new image to database.
     * 
     * @param Request $request
     * @return Image
     */
    public function addImage(Request $request)
    {
        $image = $this->imageRepository->create($request->all());
        return $image;
    }

    /**
     * Remove image from the database.
     * 
     * @param Request $request
     * @param string $url
     * @return bool
     */
    public function deleteImage(Request $request, string $uuid)
    {
        $isDeleted = $this->imageRepository->destroyById($uuid);
        return $isDeleted;
    }

    /**
     * Remove product from the database.
     * 
     * @param Request $request
     * @param string $url
     * @return bool
     */
    public function deleteProduct(Request $request, string $uuid)
    {
        $isDeleted = $this->productRepository->destroyById($uuid);
        return $isDeleted;
    }

    /**
     * 'Sell' a cart-worth of products.
     * 
     * @param Request $request
     * @return array
     */
    public function sellCart(Request $request)
    {
        $cart = $request->all();
        $products = array();
        foreach ($cart as $product_id => $quantity_sold) {
            array_push($products, $this->sellProduct($product_id, $quantity_sold));
        };

        return $products;
    }


    /**
     * 'Sell' one product.
     * 
     * @param string $product_id
     * @param int $quantity_sold
     * @return Product
     */
    public function sellProduct(string $product_id, int $quantity_sold)
    {
        $product = $this->productRepository->findById($product_id);
        if ($product->quantity_stocked < $quantity_sold) {
            throw new Exception("There are not enough items in stock.");
        }

        $newQuantityStocked = $product->quantity_stocked - $quantity_sold;
        $newQuantitySold = $product->quantity_sold + $quantity_sold;
        $this->productRepository->updateById($product_id, [
            'quantity_stocked' => $newQuantityStocked,
            'quantity_sold' => $newQuantitySold,
        ]);

        return $product;
    }
}