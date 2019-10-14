<?php

namespace App\Services;

use App\Repositories\ImageRepository;
use App\Repositories\ProductRepository;
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
}