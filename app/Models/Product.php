<?php

namespace App\Models;

use App\Models\Image;
use App\Traits\UsesUuidTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use UsesUuidTrait;

    /**
     * The name of the table associated to this model.
     * 
     * @var string
     */
    protected $table = 'products';

    /**
     * The primary key associated with the table.
     * 
     * @var string
     */
    protected $primaryKey = "product_id";

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'uuid';

    /**
     * @var boolean
     */
    public $incrementing = false; // randomly assigned uuid

    /**
     * Specifies timestamps are not being stored.
     * 
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Specifies variables which are not mass-assignable.
     * 
     * @var array
     */
    protected $guarded = [
        'product_id',
    ];

    /**
     * The model's default values for attributes.
     * 
     * @var array
     */
    protected $attributes = [
        'discount' => '0.00',
        'quantity_stocked' => '0',
        'quantity_sold' => '0',
    ];

    /**
     * Fetches all images associated to this product.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        //dd($this->hasMany(Image::class, 'product_id', 'product_id')->getResults());
        return $this->hasMany(Image::class, 'product_id', 'product_id');
    }
}
