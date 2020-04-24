<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function guests()
	{
		return $this->belongsTo('App\Guest');
	}
}
