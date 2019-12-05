<?php

namespace Manhle\CategoryPackage\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primary_key = 'id';
    protected $fillable = ['activate', 'slug'];

    public function category_products()
    {
        return $this->belongsToMany(Product::class, 'category_has_products', 'category_id', 'product_id');
    }

    public function categoryLang()
    {
        return $this->hasMany(CategoryLang::class, 'category_id', 'id');
    }

    public function categoryInfor()
    {
        return $this->hasMany(CategoryLang::class, 'category_id', 'id');
    }
}
