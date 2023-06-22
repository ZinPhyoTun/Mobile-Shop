<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_code', 'title', 'image', 'color', 'description'];

    /*
     *@return Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_code', 'c_code');
    }
}
