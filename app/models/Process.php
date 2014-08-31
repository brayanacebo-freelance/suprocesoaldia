<?php

class Process extends Eloquent {
    
	protected $guarded = array();


    public function client()
    {
        return $this->belongsTo('Client');
    }

    public function type()
    {
        return $this->belongsTo('ProcessType', 'process_type');
    }

    public function department()
    {
        return $this->belongsTo('Department');
    }
    public function city()
    {
        return $this->belongsTo('City');
    }
	public function office()
    {
        return $this->belongsTo('Office', 'office_id');
    }

    public function movements()
    {
        return $this->hasMany('Movement')->orderBy('created_at', 'DESC');
    }

    public function getDefendantAttribute($value)
    {
        return implode("<br>", json_decode($value));
    }
    public function getClaimantAttribute($value)
    {
        return implode("<br>", json_decode($value));
    }


    public function setDefendantAttribute($value)
    {
        $this->attributes['defendant'] = json_encode($value);
    }
    public function setClaimantAttribute($value)
    {
        $this->attributes['claimant'] = json_encode($value);
    }


    public function isDeletable()
    {
        return !($this->movements()->count() >= 1);
    }
}
