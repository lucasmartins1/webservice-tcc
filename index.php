<?php
return "SALVE";
$method = $_SERVER['REQUEST_METHOD'];

//Processa apenas se for post
if($method == "POST"){
	$requisicao = file_get_contents('php://input');
	$json = json_decode($requisicao);

	$text = $json->result->parameters->nome;

	switch ($text) {
		case 'farinha':
			$speech = "Oi, prazer em conhecer!";
			break;
		case 'xau':
			$speech = "Xau, xau!";
			break;
		
		default:
			$speech = "Desculpe, não entendi. Digite novamente.";
			break;
	}

	$resposta = new \stdClass();
	$resposta->speech = $speech;
	$resposta->displayText = $speech;
	$resposta->source = "webhook";
	echo json_encode($resposta);
	return json_encode($resposta);
}
else{
	return "Metódo não permitido.";
}

?>