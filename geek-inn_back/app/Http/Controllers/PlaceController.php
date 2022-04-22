<?php
namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class PlaceController extends Controller
{
    public function getAllPlaces(Request $request)
     {
        $page = $request->has('page') ? $request->get('page') : null;
        $limit = $request->has('limit') ? $request->get('limit') : 10;
        if ($page === null || $page === "null"){
            $places = Place::all();
         return response()->json(['places'=>$places]);
        } else {
            $places = Place::limit($limit)->offset(($page - 1) * $limit)->get();
         return response()->json(['places'=>$places]);
        }
    }

    public function createPlace()
    {   
        return response()->json(["places.create"]);
       // $places = Place::all();
        //return view("create", compact("places"));
    }
         
    public function storePlace(Request $request)
    {
        try{
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'adress' => 'required',
            'postal_code' => 'required',
            'city' => 'required', 
            'phone' => 'required', 
            'email' => 'required',
            'logo' => 'required',
            'cover_picture' => 'required',
            'galery_pictures' => 'required',
            'category_id' => 'required',
        ]);
      
        Place::create($request->all());
         return 
         ('success, Place created successfully');
        } catch (\Exception $e){
            return response()->json(['error' =>$e->getMessage()], 500);
        }
    }

    public function deletePlace($id)
    {
        try{
       // Place::find($id)->delete();
        $place = Place::find($id);
        if($place){
        $place->delete();
       return 
            ('success, Place deleted successfully');
        } else {
            throw new Exception('id non trouvé dans BDD');
        }
        } catch (\Exception $e){
            return response()->json(['error' =>$e->getMessage()], 500);
      }

    }
    public function readPlace($id)
    {
        try{
            $place = Place::findOrFail($id);
            if ($place){
                return response()->json(['place'=>$place]);
            }else{
                throw new Exception('id non trouve dans la BDD');
            }
        }
        catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updatePlace (Request $request, $id)
    {
        try {
             $request->validate([
            'name' => 'required',
            'description' => 'required',
            'adress' => 'required',
            'postal_code' => 'required',
            'city' => 'required', 
            'phone' => 'required', 
            'email' => 'required',
            'logo' => 'required',
            'cover_picture' => 'required',
            'galery_pictures' => 'required',
            'category_id' => 'required',
            ]);
            $place = Place::find($id);
            if($place){
            $place->update($request->all());
            $place->save();
            return "success place updated successfully";
            } else {
                throw new Exception('id non trouvé dans BDD');
            }
        } catch (\Exception $e){
            return response()->json(['error' =>$e->getMessage()], 500);
    }
}

    public function getAllSchools(Request $request)
    {
        $page = $request->has('page') ? $request->get('page') : null;
        $limit = $request->has('limit') ? $request->get('limit') : 10;
        if ($page === null || $page === "null"){
            $places = Place::where('category_id', "1")->get();
         return response()->json(['places'=>$places]);
        } else {
            $places = Place::where('category_id', "1")->limit($limit)->offset(($page - 1) * $limit)->get();
         return response()->json(['places'=>$places]);
        }
    }
    public function getAllCompanies(Request $request)
    {
        $page = $request->has('page') ? $request->get('page') : null;
        $limit = $request->has('limit') ? $request->get('limit') : 10;
        if ($page === null|| $page === "null"){
            $places = Place::where('category_id', "2")->get();
         return response()->json(['places'=>$places]);
        } else {
            $places = Place::where('category_id', "2")->limit($limit)->offset(($page - 1) * $limit)->get();
         return response()->json(['places'=>$places]);
        }
    }
    public function getAllCoworkings(Request $request)
    {
        $page = $request->has('page') ? $request->get('page') : null;
        $limit = $request->has('limit') ? $request->get('limit') : 10;
        if ($page === null || $page === "null"){
            $places = Place::where('category_id', "3")->get();
         return response()->json(['places'=>$places]);
        } else {
            $places = Place::where('category_id', "3")->limit($limit)->offset(($page - 1) * $limit)->get();
         return response()->json(['places'=>$places]);
        }
    }
    public function getAllBars(Request $request)
    {
         $page = $request->has('page') ? $request->get('page') : null;
        $limit = $request->has('limit') ? $request->get('limit') : 10;
        if ($page === null || $page === "null"){
            $places = Place::where('category_id', "4")->get();
         return response()->json(['places'=>$places]);
        } else {
            $places = Place::where('category_id', "4")->limit($limit)->offset(($page - 1) * $limit)->get();
         return response()->json(['places'=>$places]);
        }
    }
    public function getAllShops(Request $request)
    {
        $page = $request->has('page') ? $request->get('page') : null;
        $limit = $request->has('limit') ? $request->get('limit') : 10;
        if ($page === null || $page === "null"){
            $places = Place::where('category_id', "5")->get();
         return response()->json(['places'=>$places]);
        } else {
            $places = Place::where('category_id', "5")->limit($limit)->offset(($page - 1) * $limit)->get();
         return response()->json(['places'=>$places]);
        }
    }
}