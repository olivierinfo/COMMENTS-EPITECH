<?php
namespace App\Http\Controllers;
use Exception;
use App\Models\User;
use App\Models\Place;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    public function getAllReviews()
    {
         $reviews = Review::all();
         return response()->json(['reviews'=>$reviews]);
    }
    public function storeReview(Request $request)
    {
        try{
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'rate' => 'required',
            'user_id' => 'required',
            'place_id' => 'required',
        ]);
            Review::create($request->all());
            return ('success,Review created successfully');
        } catch (\Exception $e){
            return response()->json(['error' =>$e->getMessage()], 500);
        }
    }
    public function deleteReview($id)
    {
        try{
       // Review::find($id)->delete();
        $review = Review::find($id);
        if($review){
            $review->delete();
            return ('success, Review deleted successfully');

        } else {
        throw new Exception('id non trouvé dans BDD');
        } 
    }
        catch (\Exception $e) {
          return response()->json(['error' =>$e->getMessage()], 500);
        }
    }
    public function readReview($id)
    {
      $review = Review::findOrFail($id);
      return response()->json(['review'=>$review]);
    }
    public function showUserReviews()
    {
        $name = Session::get('name');
        $userName = User::where('name', $name)->firstOrFail();
        // dd($userId);
        $reviews = Review::where('user_id', $userName->id);
        return response()->json(['reviews'=>$reviews]);
    }
     public function getReviewsByPlaceId($id)
    {
        $reviews = Review::where('place_id', $id)->orderBy('created_at', 'DESC')->get();
        return response()->json(['reviews'=>$reviews]);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function place(){
        return $this->belongsTo(Place::class);
    }
    public function read($id)
    {
        //  $review = Review::findOrFail($id);
        //  return view("reviews.show", ["review" => $review]);
        $review = Review::find($id);
        
        return view('reviews.read', compact('review'));
    }
    public function updateReview(Request $request, $id)
    { 
        try{
            $request->validate([
            'title' => 'required',
            'content' => 'required',
            'rate' => 'required',
            'user_id' => 'required',
            'place_id' => 'required',
             ]);
            $review = Review::find($id);
            if($review){
                $review->update($request->all());
        //  $review->title = $request->title;
        //  $review->content = $request->content;
        //  $review->rate = $request->rate;
        //  $review->user_id = $request->user_id;
        //  $review->place_id = $request->place_id;
                $review->save();
                return 
                    ('success, Review updated successfully');
            } else {
                throw new Exception('id non trouvé dans BDD');
            }
        }catch (\Exception $e){
            return response()->json(['error' =>$e->getMessage()], 500);
        }
    } 
}