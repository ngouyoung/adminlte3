<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GroupPermission extends ParentModel
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id', 'sort'];

    public static function rulesToCreate(): array
    {
        return [
            'name' => 'required|string|max:255|unique:group_permissions',
            'parent_id' => 'integer',
            'sort' => 'integer',
        ];
    }

    public static function rulesToUpdate($id = null): array
    {
        return [
            'name' => 'required|string|max:255|unique:group_permissions,name,' . $id,
            'parent_id' => 'integer',
            'sort' => 'integer',
        ];
    }

    public function scopeParents($query)
    {
        $query->whereNull('parent_id')->orderBy('sort')->with(['child', 'permissions']);
    }

    public function permissions(): HasMany
    {
        return $this->hasMany(Permission::class, 'group_id', 'id')->orderBy('name');
    }

    public function parent() {
        return $this->belongsTo(GroupPermission::class, 'parent_id', 'id');
    }

    public function child(): HasMany
{
    return $this->hasMany(GroupPermission::class, 'parent_id', 'id')->orderBy('sort')->with(['child', 'permissions']);
}
}
