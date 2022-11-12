<?php

namespace App\Services;

use App\Models\Ingridient;

class IngridientService
{
   private $Ingridient;

   public function __construct(Ingridient $Ingridient){
        $this->Ingridient = $Ingridient;
   }

   public function all(){
        return $this->Ingridient->query();
   }

   public function sync($data){
        return $this->Ingridient->updateOrCreate($data);
   }

   public function store($data){
        return $this->Ingridient->create($data);
   }
}
