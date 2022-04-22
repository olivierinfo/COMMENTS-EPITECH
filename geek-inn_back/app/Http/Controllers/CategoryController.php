<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpKernel\Exception\HttpException;

use Illuminate\Http\Request;
use App\Models\Category;

use Exception;

class CategoryController extends Controller
{
    public function storeCategory(Request $request)
    {
            try{
                $request->validate([
                    "name"=>"required",
                ]);
                Category::create($request->all());
                return "success 200";
            }
            catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }  
    }

    public function getAllCategories()
    {
         $categories = Category::all();
         return response()->json(['categories'=>$categories]);
    }
    public function readCategory($id)
    {
      $category = Category::findOrFail($id);
      return response()->json(['category'=>$category]);
    }

    public function deleteCategory($id)
    {
        try{
            $category = Category::find($id);
            if ($category){
                $category->delete();
                return ("success 200"); 
            }else{
                throw new Exception('id non trouve dans la BDD');
            }
        }catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateCategory (Request $request, $id)
    {
        try{
            $request->validate([
                'name' => 'required',
            ]);
            $category = Category::find($id);
            if($category){
                $category->name = $request->name;
                $category->save();
               return "success 200";
            }else{
                throw new Exception('id non trouve dans la BDD');
            } 
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        } 
    }
}