<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isEmpty;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'mainImageUrl',
        'title',
        'taxPercent',
        'productCode',
        'rewardsPoints',
        'stockCount',
        'inStock',
        'price',
        'discountPercent',
        'text',
        'description'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class, "product_id");
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function GetCategoryBySubCategoryId($id)
    {
        $subcategory = SubCategory::find($id);
        if ($subcategory) {
            $catId = $subcategory->category_id;
        }
        $category = Category::find($catId);
        if ($category) {
            return $category->name;
        }
    }


    public function GetCategoryName($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return null;
        }

        if (!empty($product->category_id)) {
            $category = Category::find($product->category_id);
            if ($category) {
                return $category->name;
            }
        }

        return null;
    }

    public function getSubCategoryName($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return null;
        }


        if (!empty($product->sub_categories_id)) {
            $subCategory = SubCategory::find($product->sub_categories_id);
            if ($subCategory) {
                return $subCategory->name;
            }
        }
        return null;
    }
}
