<?php

class Client extends Eloquent {

	protected $guarded = array();

	public function user()
    {
        return $this->morphOne('User', 'loggeable');
    }

    public function processes()
    {
        return $this->hasMany('Process');
    }

    public function assistant()
    {
        return $this->belongsTo('Assistant');
    }

    public function movements()
    {
        return $this->hasManyThrough('Movement', 'Process');
    }

    public function unseenMovements()
    {
        return $this->movements()->where('movements.created_at', '>', $this->last_seen_on);
    }

    public function getUnseenMovements()
    {
        return $this->unseenMovements()->with('process')->orderBy('movements.created_at', 'DESC')->get();
    }

    public function unseenMovementsCount()
    {
        return $this->unseenMovements()->count();
    }

    public function isDeletable()
    {
        return !($this->processes()->count() >= 1);
    }

    public function delete()
    {
        $this->user()->delete();
        return parent::delete();
    }

}
