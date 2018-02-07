<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	public static function incomplete()
	{
		return static::where('completed', 0)->get();
	}


	// Query scope - wrapper around a particular query
	public function scopeIncomplete($query) // Task::incomplete
	{
		return $query->where('completed', 0);
	}
}
