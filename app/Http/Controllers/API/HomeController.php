<?php
   
namespace App\Http\Controllers\API;
   
session_start();
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Cart;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index()
    {
        $categories = Category::with('subCategories.sections')->get()->take(11);
        return view('home', compact('categories'));
    }
}