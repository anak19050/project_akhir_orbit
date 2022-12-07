<?php

namespace App\Http\Controllers;

use App\Services\supports\FoodService;
use App\Services\supports\TitleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecomController extends Controller
{
    public function index()
	{
        $foods = FoodService::all()->get();
        $titles = FoodService::join()->get();

		return view('recomendation.index', compact('foods', 'titles'));
	}

    public function store(Request $request){
        DB::beginTransaction();

        try{

            $food = [
                'title'=>$request->food,
            ];

            $storeFood = TitleService::store($food);

            DB::commit();

            return redirect()->route('recom.index');
        }catch (\Throwable $th){
            dd($th);
             return redirect()->route('recom.index');
        }
    }

	public function find($id)
	{
        $titles = FoodService::getByIdJoin($id)->first();

        return view('recomendation.create', compact('titles'));
	}

}
