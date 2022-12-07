<?php

namespace App\Services;

use App\Models\Step;

class StepService
{
   private $Step;

   public function __construct(Step $Step)
    {
        $this->Step = $Step;
    }

    public function all()
    {
		return $this->Step->query();
	}

    public function store($data)
    {
        return $this->Step->create($data);
    }

    public function update($data, $id)
    {
        return $this->Step->where('id', $id)->update($data);
    }

    public function getById($id)
    {
        return $this->Step->where('id', $id);
    }

}
