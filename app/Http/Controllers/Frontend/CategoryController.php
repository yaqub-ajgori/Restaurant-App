<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{
   public function index()
   {
        $categories = Category::all();
        return view('frontend.category.index', compact('categories'));
    }

    public function show(Category $category)
    {

        // category with menus
        $category = Category::with('menus')->where('id', $category->id)->first();
        return view('frontend.category.show', compact('category'));
    }
}
