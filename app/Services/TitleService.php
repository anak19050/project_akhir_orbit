<?php

namespace App\Services;

use App\Models\Title;

class TitleService
{
   private $Title;

   public function __construct(Title $Title)
    {
        $this->Title = $Title;
    }

    public function all()
    {
		return $this->Title->query();
	}

    public function store($data)
    {
        return $this->Title->create($data);
    }

    public function update($data, $id)
    {
        return $this->Title->where('id', $id)->update($data);
    }

    public function getById($id)
    {
        return $this->Title->where('id', $id);
    }

}
