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
    protected $primaryKey = "url";

    /**
     * @var boolean
     */
    public $incrementing = false;

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var array
     */
    protected $fillable = [
        'url',
        'alt_text',
        'type',
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'url' => '',
        'alt_text' => '',
        'type' => 'jpg',
    ];

    /**
     * @var boolean
     */
    public $timestamps = false;
}
