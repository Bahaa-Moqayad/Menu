<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('site.index',compact('categories'));
    }
    public function category($id)
    {
        $category = Category::findOrFail($id);
        $meals = Meal::where('category_id',$id);
        return view('site.category',compact('meals','category'));
    }
}
