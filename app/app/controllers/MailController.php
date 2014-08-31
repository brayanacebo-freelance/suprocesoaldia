<?php

class MailController extends BaseController {

	protected $processes;
	protected $clients;

	function __construct(ClientsRepository $clients) 
	{
		$this->clients = $clients;
	}

	public function getShow()
	{
		$clients = $this->clients->getForMail();

		return View::make('admin.email.show')->with(compact('clients'));
	}

	public function notify($client_id)
	{
		try
		{
			$client = $this->clients->getForMail()->find($client_id);
			$this->sendMail($client);
			$client->last_mail_sent_on = DB::raw('NOW()');
			unset($client->processes);
			$client->save();
			return Response::json(array());
		}
		catch(Exception $e)
		{
			Log::error($e->getMessage());
			Log::error($e->getTraceAsString());
			return Response::json(array('error' => $e->getMessage()), 500);
		}
		
	}

	public function sendMail($client)
	{
		Mail::send('emails.newsletter', compact('client'), function($m) use ($client)
		{
			$m->to($client->user->email)->subject('Actualización de procesos');
		});
	}

}
