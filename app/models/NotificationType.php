<?php

class NotificationType extends Eloquent {
	protected $guarded = array();

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
