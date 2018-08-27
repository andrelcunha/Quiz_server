<?php

	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

	require_once('../constantes.php');
	require_once('../config/DatabaseREST.php');
	require_once('../lib/Player.php');

	$database = new DatabaseREST();
	$db = $database->connect();

	$player = new Player($db);

	$data = json_decode(file_get_contents("php://input"));

	$player->name = $data->name;
	if(isset($data->score)){
		$player->score = $data->score;
	}

	//echo json_encode($player->check_for_permission($player->name));
	if(!$player->check_for_permission($player->name)){
		echo json_encode(array('message' => 'Permission Granted'));
	}else{
		echo json_encode(array('message' => 'Permission Denied'));
	}

	