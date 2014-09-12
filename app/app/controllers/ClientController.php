<?php

class ClientController extends BaseController {

	function __construct()
	{
		$this->client = Auth::user()->client();
	}

	public function getMovements()
	{

		if($this->client->user->archived === '1'){
			Auth::logout();
        	return Redirect::route('get.login')->withErrors(array('message' => 'Por favor comuniquese con un asesor, gracias!'));
		}

		$movements = $this->client->movements()->with('process')->where('archived', 0)->orderBy('created_at', 'DESC')->get();
		$total_movements_count = $movements->count();
		$unseen_movements_count = $this->client->unseenMovementsCount();
		$client = $this->client;
		$this->client->last_seen_on = DB::raw('NOW()');
		$this->client->save();
		return View::make('clients.movements.all')->with(compact('movements', 'client', 'unseen_movements_count'));
	}

	public function getReports()
	{
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="reporte.xls"');
		header('Cache-Control: max-age=0');

		$id = Input::get('id');
		$client = $this->client->find($id);
		$object = [];

		foreach ($client->processes as $process) {
			if($process->archived === '0'){
				$arrayOne = [
				"cod" => $process->id,
				"folder_number" => $process->folder_number,
				"creation_number" => $process->creation_number,
				"claimant" => $process->claimant,
				"defendant" => $process->defendant
				];
				$movement = Movement::where('process_id', $process->id)
					->orderBy('id', 'DESC')
					->limit(1)
					->first();
				$arrayTwo = [];
				if($movement){
					$action = Action::where('id', $movement->action_type)->first();
					$notification = NotificationType::where('id', $movement->notification_type)->first();
					$arrayTwo = [
						"action" => $action->name,
						"notification" => $notification->name,
						"notification_date" => $movement->notification_date,
						"auto_date" => $movement->auto_date,
						"comments" => $movement->comments
					];
				}			
				$object[] = array_merge($arrayOne, $arrayTwo);
			}
		}

		return View::make('clients.movements.report')->with(compact('object'));
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
		$movements = $this->client->movements()->with('process')->where('archived', 0)->orderBy('created_at', 'DESC')->get();
		$total_movements_count = $movements->count();
		$unseen_movements_count = $this->client->unseenMovementsCount();
		$client = $this->client;
		$this->client->last_seen_on = DB::raw('NOW()');
		$this->client->save();
		return View::make('clients.movements.daily')->with(compact('date', 'movements', 'client', 'unseen_movements_count'));
	}

}
