<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Exception;

class EventController extends Controller
{
    public function storeEvents(Request $request)
    {
        try{
            $request->validate([
                'title'=> 'required',
                'content'=> 'required',
                'galery_pictures'=> 'required',
                'place_id'=> 'required',
                'price'=> 'required',
                'date'=> 'required'
            ]);
            Event::create($request->all());
            return response()->json(['success'=> 200]);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }    
    }

    public function getAllEvents(Request $request)
    {
         $page = $request->has('page') ? $request->get('page') : null;
         $limit = $request->has('limit') ? $request->get('limit') : 10;
        if ($page === null || $page === "null"){
            $events = Event::orderBy('date', 'DESC')->get();
            return response()->json(['events'=>$events]);
        } else {
            $events = Event::orderBy('date', 'DESC')->limit($limit)->offset(($page - 1) * $limit)->get();
         return response()->json(['events'=>$events]);
        }
    }
    public function readEvent($id)
    {
      $event = Event::findOrFail($id);
      return response()->json(['event'=>$event]);
    }

    public function deleteEvents($id)
    {
        try{
                $events = Event::find($id);
            if ($events){
                $events->delete();
                return('success 200');
            }else{
                throw new Exception ("id non trouve dans BDD");
            }
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateEvents (Request $request, $id)
    {
        $request->validate([
            'title'=> 'required',
            'content'=> 'required',
            'galery_pictures'=> 'required',
            'place_id'=> 'required',
            'price'=> 'required',
            'date'=> 'required'  
        ]);
        $events = Event::find($id);
         $events->update($request->all());
         $events->save();
        return "success Event updated successfully";

    }

}