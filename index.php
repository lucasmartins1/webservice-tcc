<?php

$method = $_SERVER['REQUEST_METHOD'];

//Processa apenas se for post
if($method == "POST"){
	$requisicao = file_get_contents('php://input');
	$json = json_decode($requisicao);
	$resposta = new \stdClass();

	$alimento-origem = $json->result->parameters['alimento-origem'];
	$alimento-destino = $json->result->parameters['alimento-destino'];
	$quant = $json->result->parameters['quant'];
	$tipo = $json->result->parameters['tipo'];

	$parametros = [];

	if(isset($alimento-origem)){
		$parametros['alimento-origem'] = $alimento-origem;
	}
	if(isset($alimento-destino)){
		$parametros['alimento-destino'] = $alimento-destino;
	}
	if(isset($quant)){
		$parametros['quant'] = $quant;
	}
	if(isset($tipo)){
		$parametros['tipo'] = $tipo;
	}

	if(!isset($alimento-origem)){
		$resposta->speech = "Falta nome de alimento";
		$resposta->displayText = "Você poderia inserir o nome do alimento origem que deseja?";
		$resposta->source = "webhook";
		$resposta->contextOut = ["name" => "needOrigem", "lifespan" => 1, "parameters" => $parametros];
		return json_encode($resposta);
	}
	if(!isset($alimento-destino)){
		$resposta->speech = "Falta nome de alimento";
		$resposta->displayText = "Você poderia inserir o nome do alimento destino que deseja?";
		$resposta->source = "webhook";
		$resposta->contextOut = ["name" => "needOrigem", "lifespan" => 1, "parameters" => $parametros];
		return json_encode($resposta);
	}
	if(!isset($quant)){
		$resposta->speech = "Falta nome de alimento";
		$resposta->displayText = "Você poderia inserir a quantidade que deseja?";
		$resposta->source = "webhook";
		$resposta->contextOut = ["name" => "needOrigem", "lifespan" => 1, "parameters" => $parametros];
		return json_encode($resposta);
	}
	if(!isset($tipo)){
		$resposta->speech = "Falta nome de alimento";
		$resposta->displayText = "Você poderia inserir o tipo de alimento que deseja?";
		$resposta->source = "webhook";
		$resposta->contextOut = ["name" => "needOrigem", "lifespan" => 1, "parameters" => $parametros];
		return json_encode($resposta);
	}

	$resposta->speech = "Ok!";
	$resposta->displayText = "Parabens, ta tudo certo!";
	$resposta->source = "webhook";
	return json_encode($resposta);
}
else{
	return "Metódo não permitido.";
}

?>