<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProcessesRepository {

    function __construct(ClientsRepository $clients) 
    {
        $this->clients = $clients;
    }

    private function getClient($user)
    {
        if (is_object($user)) return $user;
        else return $this->clients->find($user);
    }

	public function get($user)
	{
        $userModel = $this->getClient($user);
        return $userModel->processes;
	}

	public function find($user, $id)
	{
        $userModel = $this->getClient($user);
        $process = $userModel->processes->find($id);
        if (!$process) throw new ModelNotFoundException;
        $process->load('type', 'department', 'city', 'office','movements.action','movements.notification');
        return $process;
	}
	
}
