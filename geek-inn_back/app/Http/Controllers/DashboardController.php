<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Place;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function countAllUsers(){
        $total = User::all()->count();
        return response()->json($total);
    }
    public function countLastUsers(){
        $total = User::where('created_at', '>', now()->subDays(30)->endOfDay())->count();
        return response()->json($total);
    }
     public function countAdminUsers(){
        $total = User::where('is_admin', 1)->count();
        return response()->json($total);
    }
     public function countAllReviews(){
        $total = Review::all()->count();
        return response()->json($total);
    }
     public function countLastReviews(){
        $total = Review::where('created_at', '>', now()->subDays(30)->endOfDay())->count();
        return response()->json($total);
    }
     public function countReviewsByPlaceId($id){
        $total = Review::where('place_id', $id)->count();
        return response()->json($total);
    }
    public function averageRateByPlaceId($id){
        $averageRate = Review::where('place_id', $id)->average('rate');
        $rounded_value = round($averageRate, 1); 
        return response()->json($rounded_value);
    }
    public function getPlacesOrderByRate(){
        // $averageRate = Review::where('place_id', $id)->average('rate');
        // $places = Place::orderBy($averageRate, 'DESC');
        // return response()->json(['places'=>$places]);
    }
}