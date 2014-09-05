<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClientsRepository {

	protected $user;
	protected $assistant;

	function __construct() 
	{
		$this->user = Auth::user();
		$this->assistant = $this->user->isAssistant() ? $this->user->getLoggeableResult() : null;
	}

	public function get()
	{
        $clients = null;
        if ($this->user->isAdmin()) 
        {
        	$clients = Client::all();
        }
        else 
        {
        	//$clients = $this->assistant->clients;
            $clients = Client::all();
        }
        return $clients;
	}

	public function find($id)
	{
        $client = null;
        if ($this->user->isAdmin()) 
        {
        	$client = Client::with('processes', 'user')->findOrFail($id);
        }
        else if ($this->user->isClient())
        {
            $client = $this->user->getLoggeableResult();
        }
        else 
        {
        	$client = $this->assistant->clients()->with('processes', 'user')->find($id);
        	if (!$client) throw new ModelNotFoundException;
        }
        return $client;
	}


    public function create($attrs)
    {
        return Client::create($attrs);
    }


    public function getForMail()
    {
        $assistant = Auth::user()->getLoggeableResult();

        $clients = $assistant->clients()
            ->with(array('processes' => function($q) { $q->orderBy('created_at', 'DESC'); }, 
                        'processes.movements' => function($q) { $q->orderBy('created_at', 'DESC'); }))
            ->whereHas('processes', function ($q)
            {
                $q->where('processes.updated_at', '>', DB::raw('`clients`.`last_mail_sent_on`'));

            })->get();

        $clients->each(function ($client)
        {
            $client->processes = $client->processes->filter(function ($process) use (&$client) { return $process->updated_at > $client->last_mail_sent_on; });
        });

        return $clients;
    }

    public function findData($from = null, $up = null)
    {
        $client = null;
        if ($this->user->isAdmin()) 
        {
            // $client = Client::with('processes', 'user')->findOrFail($id);
            $client = Client::where('id', '>', 30)->get();
        }
        return $client;
    }

    // public function log($description)
    // {
    //     $data = [
    //         'user_id' => $this->user->id,
    //         'description' => $description
    //     ];
    //     $log = Log::create($data);
    //     return $log;
    // }

}
