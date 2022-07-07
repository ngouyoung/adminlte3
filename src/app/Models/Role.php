<?php

namespace App\Models;

use App\Traits\ValidationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory, ValidationTrait;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
        'deleted_at' => 'date:Y-m-d',
    ];

    public static function rulesToCreate(): array
    {
        return [
            'name' => 'required|string|max:255|unique:roles',
        ];
    }

    public static function rulesToUpdate($id = null): array
    {
        return [
            'name' => 'required|string|max:255|unique:roles,name,' . $id
        ];
    }
}
