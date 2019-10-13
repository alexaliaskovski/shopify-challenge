<?php

namespace App\Models;

use App\Models\Product;
use App\Traits\UsesUuidTrait;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use UsesUuidTrait;

    /**
     * The name of the table associated to this model.
     * 
     * @var string
     */
    protected $table = 'images';

    /**
     * The primary key associated with the table.
     * 
     * @var string
     */
    protected $primaryKey = "image_id";

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
    protected $fillable = [
        'product_id',
        'url',
        'alt_text',
        'name',
    ];

    /**
     * The model's default values for attributes.
     * 
     * @var array
     */
    protected $attributes = [
        'name' => '',
        'alt_text' => '',
    ];

    /**
     * Fetches the product associated to this image.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
