<?php
header('Content-Type: application/json');

function processar($att){
	if($att['result']['action'] == ""){
		//retorna resposta
		envia(array(
			"source" 		=> $att['result']['source'],
			"speech" 		=> ".........Texto..........",
			"displayText"	=> ".........Texto..........",
			"contextOut"	=> array();
		));
	}
}

function envia($parametros){	
	echo json_encode($parametros);
}

$att_resposta = file_get_contents("php://input");
$att = json_decode($att_resposta, true);
if(isset($update['result']['action'])){
	processar($att);
}
?>