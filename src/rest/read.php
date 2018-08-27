<?php

	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	require_once('../constantes.php');
	require_once('../config/DatabaseREST.php');
	require_once('../lib/Player.php');

	$database = new DatabaseREST();
	$db = $database->connect();

	$player = new player($db);

	$result = $player->read();
	$num = $result->rowCount();

	if($num > 0){
		$players_arr = array();
		$players_arr['data'] = array();

		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			extract($row);

			$player_item = array(
				'id' => $id,
				'name' => $name,
				'score' => $score,
			);

			array_push($players_arr['data'], $player_item);
		}
		echo json_encode($players_arr);
	}else{
		echo json_encode(
			array('message' => 'No player')
		);
	}