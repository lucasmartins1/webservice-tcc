<?php
header('Content-Type: application/json');

function processar($json){
	if($json['result']['action'] == ""){
		//retorna resposta
		envia(array(
			"source" 		=> $json['result']['source'],
			"speech" 		=> ".........Texto..........",
			"displayText"	=> ".........Texto..........",
			"contextOut"	=> array();
		));
	}
}

function envia($parametros){	
	echo json_encode($parametros);
	return json_encode($parametros);
}

$requisicao = file_get_contents("php://input");
$json = json_decode($requisicao);
if(isset($json['result']['action'])){
	echo "processando";
	processar($json);
}
?>