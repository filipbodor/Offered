<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Subcategory;
use App\Models\Advertisement;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('include.categories', compact('categories'));
    }

    public function subcategory(Subcategory $subcategory)
    {
        // Fetch advertisements associated with the subcategory
        $advertisements = Advertisement::where('subcategory_id', $subcategory->id)->get();


        // Return the view with the advertisements and subcategory info
        return view('advertisements.subcategory', compact('advertisements', 'subcategory'));
    }

    public function forCategory($categoryId)
    {
        $subcategories = Subcategory::where('category_id', $categoryId)->get(['id', 'name']);

        return response()->json($subcategories);
    }

    public static function getAllCategories() {
        return Category::all();
    }

}
