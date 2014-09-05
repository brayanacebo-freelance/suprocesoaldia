<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	protected $guarded = array('loggeable_type', 'loggeable_id');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function loggeable()
    {
        return $this->morphTo();
    }

    public function getLoggeableResult()
    {
    	return $this->loggeable()->getResults();
    }

    public function client()
    {
    	return $this->getLoggeableResult();
    }
    public function aux()
    {
    	return $this->getLoggeableResult();
    }
    public function isAdmin()
    {
    	return $this->loggeable_type === 'SuperAdmin';
    }
    public function isClient()
    {
    	return $this->loggeable_type === 'Client';
    }
    public function isAssistant()
    {
    	return $this->loggeable_type === 'Assistant';
    }
    public function isExecutive()
    {
    	return $this->loggeable_type === 'Executive';
    }
    public function isArchived()
	{
		return $this->archived;
	}
	public function isSuspended()
	{
		return $this->archived;
	}
}