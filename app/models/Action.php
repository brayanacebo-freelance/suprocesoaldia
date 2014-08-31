<?php

class Action extends Eloquent {

	protected $guarded = array();

	public static function getSelectList()
	{
		$actions = static::all();
		$ret = array();
		foreach ($actions as $action) 
		{
			$ret[$action->id] = $action->name;
		}
		return $ret;
	}
}
