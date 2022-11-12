<?php

namespace App\Http\Controllers;

use App\Services\supports\FoodService;
use App\Services\supports\IngridientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    public function index(){
        $foods = FoodService::all()->get();
        $ingridients = IngridientService::all()->get();

        return view('food.index', compact('foods', 'ingridients'));
    }

    public function store(Request $request){
        DB::beginTransaction();

        try{
            $index = 0;

            foreach ($request->ingridient_id as $ingridient_id){
                $food = [
                    'food_name'=>$request->food_name,
                    'ingridient_id'=>$ingridient_id,
                ];

                $storeFood = FoodService::store($food);
            }

            $index++;

            DB::commit();

            return redirect()->route('food.index');
        }catch (\Throwable $th){
            dd($th);
             return redirect()->route('food.index');
        }
    }
}
