<?php

class Office extends Eloquent {

	protected $guarded = array();

	public function city()
	{
	    return $this->belongsTo('City', 'city_id');
	}

	public static function getSelectList()
	{
		$offices = static::all();
		$ret = array();
		foreach ($offices as $office) 
		{
			$ret[$office->id] = $office->name;
		}
		return $ret;
	}
}
