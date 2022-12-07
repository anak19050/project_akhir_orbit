<?php

namespace App\Http\Controllers;

use App\Services\supports\FoodService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    public function index(){
        $foods = FoodService::all()->get();

        return view('food.index', compact('foods'));
    }

    public function create(){

        return view('food.create');
    }

    public function store(Request $request){
        DB::beginTransaction();

        try{

            $food = [
                'title'=>$request->food_name,
                'ingredients'=>$request->ingredient,
                'steps'=>$request->step,
            ];

            $storeFood = FoodService::store($food);

            DB::commit();

            return redirect()->route('food.index');
        }catch (\Throwable $th){
            dd($th);
             return redirect()->route('food.index');
        }
    }
}
