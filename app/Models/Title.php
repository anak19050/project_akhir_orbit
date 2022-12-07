<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $table ='title';
    protected $guarded = [];
    use HasFactory;

    public function title()
    {
    	return $this->hasOne(Food::class, 'id', 'id');
    }
}
