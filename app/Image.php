<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
     * @var boolean
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = [
        'product_id',
        'url',
        'alt_text',
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'product_id' => '',
        'url' => '',
        'alt_text' => '',
    ];

    /**
     * @var boolean
     */
    public $timestamps = false;
}
