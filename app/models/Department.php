<?php

class Department extends Eloquent {

	protected $guarded = array();

    public function cities()
    {
        return $this->hasMany('City');
    }

    public static function getSelectList()
    {
    	$departments = static::all();
    	$ret = array();
    	foreach ($departments as $department) 
    	{
    		$ret[$department->id] = $department->name;
    	}
    	return $ret;
    }
}
