<?php

namespace App\Services;

use App\Models\Ingredient;

class IngredientService
{
   private $Ingredient;

   public function __construct(Ingredient $Ingredient)
    {
        $this->Ingredient = $Ingredient;
    }

    public function all()
    {
		return $this->Ingredient->query();
	}

    public function store($data)
    {
        return $this->Ingredient->create($data);
    }

    public function update($data, $id)
    {
        return $this->Ingredient->where('id', $id)->update($data);
    }

    public function getById($id)
    {
        return $this->Ingredient->where('id', $id);
    }

}
