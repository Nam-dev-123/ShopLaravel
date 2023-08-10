<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function getProducts() {
        return $this->hasMany(Product::class,'category_id','id');
    }

    protected $fillable = [
        'name',
        'slug',
        'depth',
        'parent_id',
    ];
}
