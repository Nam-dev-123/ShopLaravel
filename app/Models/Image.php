<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    public function getProduct() {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    protected $fillable = [
        'name',
        'product_id',
        'path',
    ];
}
