<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
       'brand_id',
       'category_id',
       'subcategory_id',
       'unique_id',
       'product_name',
       'page_title',
       'page_description',
       'meta_title',
       'meta_description',
       'product_description',
       'product_thambnail',
       'product_thambnail_alt',
        'slug'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function multipleimages()
    {
        return $this->hasMany(Multipleimage::class);
    }

}