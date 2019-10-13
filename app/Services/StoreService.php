<?php

namespace App\Services;

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
}