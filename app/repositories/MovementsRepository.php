<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class MovementsRepository {

	protected $user;
	protected $client;

	function __construct() 
	{
		$this->user = Auth::user();
		$this->client = $this->user->isClient() ? $this->user->client() : null;
	}

	public function unseenMovements($client)
	{
		return $client->movements()->where('created_at', '>', $client->last_seen_on);
	}

	public function unseenMovementsCount($client)
	{
		return $this->unseenMovements()->count();
	}

}
