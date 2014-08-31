<?php

class Assistant extends Eloquent {

	protected $guarded = array();

	public function user()
    {
        return $this->morphOne('User', 'loggeable');
    }

    public function clients()
    {
        return $this->hasMany('Client');
    }

    public function processes()
    {
        return $this->hasManyThrough('Process', 'Client');
    }

    public function delete()
    {
        $this->user()->delete();
        return parent::delete();
    }

}
