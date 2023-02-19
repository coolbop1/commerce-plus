<?php
   
namespace App\Http\Controllers\API;
   
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Category;

class HomeController extends BaseController
{
    public function index()
    {
        $categories = Category::with('subCategories.sections')->get()->take(11);
        return view('home', compact('categories'));
    }
}