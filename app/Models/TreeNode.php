<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TreeNode extends Model
{
    protected $fillable = ['name', 'parent_id'];
    
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    
    public function getAllDescendants()
    {
        return $this->loadMissing('children.children')->children;
    }
}