<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\CategoryResource;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Section;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;

class CategoryController extends BaseController
{

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $input = $request->all();
        $input['verified'] = true;
        if($request->parent_id && !empty($request->parent_id)){
            if(is_numeric($request->parent_id)) {
                $input['category_id'] = $request->parent_id;
                $category = SubCategory::updateOrCreate(
                    ['name' => $request->name],
                    $input
                );
            } else {
                $parents_data = explode('_', $request->parent_id);
                $input['category_id'] = $parents_data[0];
                $input['sub_category_id'] = $parents_data[1];
                $category = Section::updateOrCreate(
                    ['name' => $request->name],
                    $input
                );
            }
        } else {
            $category = Category::updateOrCreate(
                ['name' => $request->name],
                $input
            );
        }

        

        return $this->sendResponse(new CategoryResource($category), 'Category created successfully.');
    }

    public function listCategories(Request $request){
        $user_id = $request->user_id ?? null;
        $categories = Category::when($user_id, function($query) use($user_id){
            $query->where('verified', true)->orWhere('user_id', $user_id);
        }, function($query){
            $query->where('verified', true);
        })->get();
    
        return $this->sendResponse(CategoryResource::collection($categories), 'Categories retrieved successfully.');
    }

    public function updateCategory(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $category = Category::find($request->id);
        if(is_null($category)){
            return $this->sendError('Category not found', [], 404);
        }
        
        $category->update([
            'name' => $request->name ?? $category->name,
            'description' => $request->description ?? $category->description,
            'verified' => $request->verified ?? $category->verified
        ]);
        $category = Category::find($request->id);

        return $this->sendResponse($category, 'Category edited successfully.');
    }

    public function deleteCategory(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $category = Category::find($request->id);
        if(is_null($category)){
            return $this->sendError('Category not found', [], 404);
        }
        $category->delete();

        return $this->sendResponse([], 'Category deleted successfully.');
    }

    public function listCategoryProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'category_type' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        switch ($request->category_type) {
            case 'category':
                $category = Category::with('products')->find($request->id);
                break;
            case 'sub_category':
                $category = SubCategory::with('products')->find($request->id);
                break;
            case 'section':
                $category = Section::with('products')->find($request->id);
                break;
            
            default:
            $category = Category::with('products')->find($request->id);
                break;
        }

        $products = $category->products()->when($request->min_price, function($q) use($request){
            return $q->where('price', '>=', $request->min_price);
        })->when($request->max_price, function($q) use($request){
            return $q->where('price', '<=', $request->max_price);
        })->when($request->sort_by, function($q) use($request){
            switch ($request->sort_by) {
                case 'newest':
                    return $q->orderBy('created_at', 'asc');
                    break;
                case 'oldest':
                    return $q->orderBy('created_at', 'desc');
                    break;
                case 'price-asc':
                    return $q->orderBy('price', 'asc');
                    break;
                case 'price-desc':
                    return $q->orderBy('price', 'desc');
                    break;
                
                default:
                return $q->orderBy('created_at', 'desc');
                    break;
            }
        })->when($request->brand, function($q) use($request){
            return $q->where('brand_id', $request->brand);
        })->get();
        
        return $this->sendResponse($products, 'Category Product retrieved successfully.');
    }

    public function listBrandProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
        $brand = Brand::with('products')->find($request->id);
        $products = $brand->products()->when($request->min_price, function($q) use($request){
            return $q->where('price', '>=', $request->min_price);
        })->when($request->max_price, function($q) use($request){
            return $q->where('price', '<=', $request->max_price);
        })->when($request->sort_by, function($q) use($request){
            switch ($request->sort_by) {
                case 'newest':
                    return $q->orderBy('created_at', 'asc');
                    break;
                case 'oldest':
                    return $q->orderBy('created_at', 'desc');
                    break;
                case 'price-asc':
                    return $q->orderBy('price', 'asc');
                    break;
                case 'price-desc':
                    return $q->orderBy('price', 'desc');
                    break;
                
                default:
                return $q->orderBy('created_at', 'desc');
                    break;
            }
        })->get();

        return $this->sendResponse($products, 'Brand Product retrieved successfully.');
    }
}