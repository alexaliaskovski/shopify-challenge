<?php

namespace App\Traits;

use Webpatser\Uuid\Uuid;

/**
 * Followed from instructions found online.
 * https://medium.com/@steveazz/setting-up-uuids-in-laravel-5-552412db2088
 */

trait UsesUuidTrait
{
    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::generate()->string;
        });
    }
}