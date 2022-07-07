<?php

namespace App\Traits;

trait CastTrait
{
    private static $_dates = ['created_at', 'updated_at', 'deleted_at', 'dob'];

    /**
     * @return string[]
     */
    public static function casts(): array
    {
        return [
            'created_at' => 'date:Y-m-d',
            'updated_at' => 'date:Y-m-d',
            'deleted_at' => 'date:Y-m-d',
            'dob' => 'date:Y-m-d',
        ];
    }
}
