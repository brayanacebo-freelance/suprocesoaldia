<?php

class ProcessType extends Eloquent 
{
	protected $guarded = array();

	// protected $table = 'process_types';


    public static function getSelectList()
    {
    	$types = static::all();
    	$ret = array();
    	foreach ($types as $type) 
    	{
    		$ret[$type->id] = $type->name;
    	}
    	return $ret;
    }
}
