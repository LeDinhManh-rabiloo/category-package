<?php

namespace Manhle\CategoryPackage\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryLang extends Model
{
    protected $table = "categories_langs";
    protected $primary_key = "id";
    protected $fillable = [
        "category_id", "name", "description",
        "meta_title", "meta_description", "lang_id"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function lang()
    {
        return $this->belongsTo(Lang::class, 'lang_id', 'id');
    }
}
