<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\CategoryResource;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Models\Category;
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

        $category = Category::updateOrCreate(
            ['name' => $request->name],
            $input
        );

        return $this->sendResponse(new CategoryResource($category), 'Category created successfully.');
    }

    public function listCategories(Request $request){
        $categories = Category::where('verified', true)->orWhere('user_id', $request->user()->id)->get(); //Product::all();
    
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
}