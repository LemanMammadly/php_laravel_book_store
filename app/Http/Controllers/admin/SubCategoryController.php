<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function GetSubCateories($id)
    {
        $subcategories = SubCategory::where('category_id',$id)->get();
        if($subcategories)
        {
            return $subcategories;
        }
        return null;
    }
}
