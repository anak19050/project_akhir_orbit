<?php

namespace App\Http\Controllers;

use App\Services\supports\IngridientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngridientController extends Controller
{
    public function index(){
        $ingridients = IngridientService::all()->get();

        return view('ingridient.index', compact('ingridients'));
    }

    public function store(Request $request){
        DB::beginTransaction();

        try{
            $ingridient = [
                'ingridient'=>$request->ingridient,
            ];

            $storeIngridient = IngridientService::store($ingridient);

            DB::commit();

            return redirect()->route('ingridient.index');
        }catch (\Throwable $th){
            dd($th);
             return redirect()->route('ingridient.index');
        }
    }
}
