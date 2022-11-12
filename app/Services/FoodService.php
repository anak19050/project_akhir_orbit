<?php

namespace App\Services;

use App\Models\Food;

class FoodService
{
   private $Food;

   public function __construct(Food $Food){
        $this->Food = $Food;
   }

   public function all(){
        return $this->Food->query();
   }

   public function sync($data){
        return $this->Food->updateOrCreate($data);
   }

   public function store($data){
        return $this->Food->create($data);
   }
}
