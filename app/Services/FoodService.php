<?php

namespace App\Services;

use App\Models\Food;
use Illuminate\Support\Facades\DB;

class FoodService
{
   private $Food;

   public function __construct(Food $Food)
    {
        $this->Food = $Food;
    }

    public function all()
    {
		return $this->Food->query();
	}

    public function store($data)
    {
        return $this->Food->create($data);
    }

    public function update($data, $id)
    {
        return $this->Food->where('id', $id)->update($data);
    }

    public function getById($id)
    {
        return $this->Food->where('id', $id);
    }

    public function join()
    {
        $data = DB::table('food_ingredients')
        ->join('title', 'title.title', '=', 'food_ingredients.id')
        ->select(
            'food_ingredients.id',
            'food_ingredients.title as titles',
            'food_ingredients.ingredients as ingredients',
            'food_ingredients.steps as steps',
        );
        return $data;
    }

    public function getByIdJoin($id)
    {
        return $this->join()->where('food_ingredients.id', $id);
    }

}
