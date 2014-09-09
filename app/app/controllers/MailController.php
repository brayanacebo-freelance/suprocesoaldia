<?php

class MailController extends BaseController {

	protected $processes;
	protected $clients;

	function __construct(ClientsRepository $clients) 
	{
		$this->user = Auth::user();
		$this->clients = $clients;
	}

	public function getShow()
	{
		$users = $this->user->where('archived', 0)->where('suspended', 0)->where('loggeable_type','Client')->get();
		foreach ($users as $user) {
			$client = Client::where('id', $user->loggeable_id)->first();
			if($client){
				$data = [
					'id' => $user->id,
					'name' => ($client->in_charge) ? $client->in_charge : null
				];
				Mail::send('emails.newsletter', $data, function($message) use ($user,$client)
				{
				    $message->to($user->email, $client->in_charge)->subject('Notificación de procesos diarios');
				});
			}
		}
		return Redirect::route('clients.index')->with('notifications', "Notificaciones enviados con éxito!");
		
	}

}
