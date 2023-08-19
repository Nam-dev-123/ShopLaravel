<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function getImages() {
        return $this->hasMany(Image::class,'product_id','id');
    }

    public function getCategory() {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function getUser() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    protected $fillable = [
        'name',
        'slug',
        'origin_price',
        'sale_price',
        'discount_percent',
        'content',
        'category_id',
        'status',
        'user_id',
    ];
}
