<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Traits\UploadTrait;

class CarController extends Controller
{
    public function newCar(Request $request){
        
        // $request->validate([
        //     'make' => 'required',
        //     "model" => "required|unique:cars",
        //     "produced_on" => "required",
        //     "image" => "required",
        // ]);
        $this->validate(
            $request,
            ["make"=>"required", "model"=>"required", "produced_on"=>"required"]
        );

        $car = new Car;
        $car->make = request("make");
        $car->model = request("model");
        $car->produced_on = request("produced_on");
        $image = $request->file("image_url");
        
        //dealing with image
        $name = $image;
        //define folder path
        $folder = "\images\\";
        //make file path where image will be stored
        $filepath = $folder . $name . '.' . $image->getClientOriginalExtension();
        //upload image
        //$file = $image->storeAs($folder, $name. "." . $image->getClientOriginalExtension(), "public");
        //$this->uploadOne($image, $folder, "public", $name);
       
        //set user profile image path in db to filepath
        $car->image_url = $filepath;

        //save details to db
        $car->save();
        request()->session()->flash("form_submit", "Car saved successfully");
        return view("newcar");
    }
    public function particularCar($id){
        $car = Car::find($id);
        return view("particularcar", ["cars" => $car]);
    }
    public function allCars(){
        $car = Car::all();
        return view("car", ["cars" => $car]);
    }
    public function newCarForm(){
        return view("newcar");
    }
    public function carReviews($id){
        $car = Car::find($id);
        $reviews = $car->reviews;
        return $reviews;
    }


    //create(one) [POST]
    public function newItem(Request $request){
        $item = new Item;
        $item->attr1 = /*request("attr1")*/ /*or*/ /*$request->input("attr1")*/ /*or*/ $request->attr1;
        $item->save();

        //JSON below
        return response()->json( ["message" => "new item created"], 201 );
    }
    //Route::post(items, "ItemController@newItem")

    //show (one) [GET]
    public function showItem($id){
        $item = Item::find($id); //option 1
        if(Item::where("id", $id)->exists()){
            $item = Item::where("id", $id)->get()->toJson(JSON_PRETTY_PRINT);
            //JSON below
            return response($item, 200);
        }
        else{
            //JSON below
            return response()->json( ["message" => "item not found"], 404 );
        }

    }
    //Route::get(items/{id}, "ItemController@showItem")

    //delete (one) [DELETE]
    public function deleteItem($id){
        $item = Item::find($id);//option 1
        $item->delete();

        if(Item::where("id", $id)->exists()){
            $item = Item::find($id);
            $tem->delete();
            //JSON below
            return response()->json( ["message" => "items deleted"], 200 );
        }
        else{
            //JSON below
            return response()->json( ["message" => "item not found"], 401 );
        }
        
    }
    //Route::delete(items/{id}, ItemController@deleteItem)

    //update(one) [PUT]
    public function updateItem(Request $request, $id){
        $item = Item::find($id);//option 1
        $item->attr1 = "12345";
        $item->save();

        if(Item::where("id", $id)->exists()){
            $item = Item::find($id);
            $item->attr1 = is_null($request->name) ? $item->attr1 : $request->attr1;
            $tem->save();
            //JSON below
            return response()->json( ["message" => "items updated successfully"], 200 );
        }
        else{
            //JSON below
            return response()->json( ["message" => "item not found"], 401 );
        }
        
    }
    //Route::put(items/{id}, ItemController@updateItem)

    //show(all) [GET]
    public function showAllItems(){
        $items = Item::all(); //option 1
        $items = Item::get()->toJson(JSON_PRETTY_PRINT);

        //JSON below
        return response($items, 200);
    }
    //Route:post(items/, ItemController@showAllItems)
    

}
