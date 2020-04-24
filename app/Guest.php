<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class 	Guest extends Model
{
    public function answers()
	{
		return $this->hasMany('App\Answer');
	}
}
