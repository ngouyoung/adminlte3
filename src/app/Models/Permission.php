<?php

namespace App\Models;

use App\Traits\ValidationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory, ValidationTrait, SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = ['name', 'guard_name', 'group_id'];

    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
        'deleted_at' => 'date:Y-m-d',
    ];

    public static function rulesToCreate(): array
    {
        return [
            'name' => 'required|string|max:255|unique:permissions',
            'group_id' => 'required',
        ];
    }

    public static function rulesToUpdate($id = null): array
    {
        return [
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
//            'group_id' => 'required',
        ];
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(GroupPermission::class, 'group_id', 'id');
    }
}
