<?php

class City extends Eloquent {

	protected $guarded = array();

	public function department()
    {
        return $this->belongsTo('Department');
    }
    public function offices()
    {
        return $this->hasMany('Office');
    }

    public static function getSelectList()
    {
    	$cities = static::all();
    	$ret = array();
    	foreach ($cities as $city) 
    	{
    		$ret[$city->id] = $city->name;
    	}
    	return $ret;
    }
}
