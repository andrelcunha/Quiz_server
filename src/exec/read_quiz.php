<?php
require('ui/basicvars.php');

$quiz = new Quiz();
$quiz = $quiz->Selecionar('1a7e6271-a631-11e8-bbc6-0800270a6e32');
if(count($quiz) > 0){

	$perguntaArray = Pergunta::Listar('1a7e6271-a631-11e8-bbc6-0800270a6e32');
	$pergToJson = array();

	foreach ($perguntaArray as $p) {
		$respostaArray = Resposta::Listar($p->Id);
		$respToJson = array();


		foreach($respostaArray as $r){
			$resp_item = array(
				'id' => $r->Id,
				'texto' => $r->Texto,
				'opcaoCorreta' => $r->Correta,
				'idPergunta' => $r->Pergunta
			);
			array_push($respToJson, $resp_item);
		}
		

		$perg_item = array(
			'id' => $p->Id,
			'enunciado' => $p->Enunciado,
			'opcoesRespostas' => $respToJson,
			'peso' => $p->Dificuldade
		);
		array_push($pergToJson, $perg_item);
	}

	$quizToJson = array();
	$quizToJson['quizzes'] = array();

	$quiz_item = array(
		'id' => $quiz->Id,
		'nome' => $quiz->Nome,
		'pontuacaoPadrao' => $quiz->PontuacaoPadrao,
		'perguntas' => $pergToJson,
		//'tempoGeral' => $quizarr->TempoTotal
		'tempoGeral' => '180'
	);
	array_push($quizToJson['quizzes'], $quiz_item);

	echo json_encode($quizToJson);
}else{
	echo json_encode(
			array('message' => 'No Quiz')
		);
}

?>