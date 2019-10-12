<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Image extends Model
{
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
    // protected $attributes = [
    //     'product_id' => '',
    //     'url' => '',
    //     'alt_text' => '',
    // ];

    /**
     * Fetches the product associated to this image.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
