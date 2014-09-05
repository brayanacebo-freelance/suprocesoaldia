<?php

class ClientController extends BaseController {

	function __construct()
	{
		$this->client = Auth::user()->client();
	}

	public function getMovements()
	{

		if($this->client->user->archived === 1){
			Auth::logout();
        	return Redirect::route('get.login')->withErrors(array('message' => 'Por favor comuniquese con un asesor, gracias!'));
		}

		$movements = $this->client->movements()->with('process')->orderBy('created_at', 'DESC')->get();
		$total_movements_count = $movements->count();
		$unseen_movements_count = $this->client->unseenMovementsCount();
		$client = $this->client;
		$this->client->last_seen_on = DB::raw('NOW()');
		$this->client->save();
		return View::make('clients.movements.all')->with(compact('movements', 'client', 'unseen_movements_count'));
	}

	public function getReports()
	{
		$unseen_movements_count = $this->client->unseenMovementsCount();
		return View::make('clients.movements.report')->with(compact('unseen_movements_count'));
	}

	public function getMovementsInRage()
	{
		$from = new DateTime(Input::get('from'));
		$until = new DateTime(Input::get('until'));

		$movements = $this->client->movements()->with('process')
						->orderBy('movements.created_at', 'DESC')
						->whereBetween('movements.created_at', array($from, $until))
						->orWhereBetween('movements.updated_at', array($from, $until))
						->get();


		$movements = $movements->map(function($movement) {
			return array(
				$movement->id,
				$movement->notification_date,
				$movement->process->claimant,
				$movement->process->defendant,
				$movement->comments,
				''
			);

		});

		return Response::json($movements);
	}

	public function getMovementsDaily()
	{
		if($this->client->user->archived === 1){
			Auth::logout();
        	return Redirect::route('get.login')->withErrors(array('message' => 'Por favor comuniquese con un asesor, gracias!'));
		}
		$date = date('Y-m-d');
		$movements = $this->client->movements()->with('process')->orderBy('created_at', 'DESC')->get();
		$total_movements_count = $movements->count();
		$unseen_movements_count = $this->client->unseenMovementsCount();
		$client = $this->client;
		$this->client->last_seen_on = DB::raw('NOW()');
		$this->client->save();
		return View::make('clients.movements.daily')->with(compact('date', 'movements', 'client', 'unseen_movements_count'));
	}

}
