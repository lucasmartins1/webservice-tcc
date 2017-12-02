<?php

$method = $_SERVER['REQUEST_METHOD'];

//Processa apenas se for post
if($method == "POST"){
	$requisicao = file_get_contents('php://input');
	$json = json_decode($requisicao);

	$resposta = new \stdClass();

	$alimento_origem = $json->result->parameters['alimento-origem'];
	$alimento_destino = $json->result->parameters['alimento-destino'];
	$quant = $json->result->parameters['quant'];
	$tipo = $json->result->parameters['tipo'];

	$parametros = [];

	if(isset($alimento_origem)){
		$parametros['alimento-origem'] = $alimento_origem;
	}
	if(isset($alimento_destino)){
		$parametros['alimento-destino'] = $alimento_destino;
	}
	if(isset($quant)){
		$parametros['quant'] = $quant;
	}
	if(isset($tipo)){
		$parametros['tipo'] = $tipo;
	}
	return $parametros;

	if(!isset($alimento_origem)){
		$resposta->speech = "Falta nome de alimento";
		$resposta->displayText = "Você poderia inserir o nome do alimento origem que deseja?";
		$resposta->source = "webhook";
		$resposta->contextOut['name'] = "needOrigem";
		$resposta->contextOut['lifespan'] = 1;
		$resposta->contextOut['parameters'] = $parametros;
		return json_encode($resposta);
	}
	if(!isset($alimento_destino)){
		$resposta->speech = "Falta nome de alimento";
		$resposta->displayText = "Você poderia inserir o nome do alimento destino que deseja?";
		$resposta->source = "webhook";
		$resposta->contextOut['name'] = "needDestino";
		$resposta->contextOut['lifespan'] = 1;
		$resposta->contextOut['parameters'] = $parametros;
		return json_encode($resposta);
	}
	if(!isset($quant)){
		$resposta->speech = "Falta nome de alimento";
		$resposta->displayText = "Você poderia inserir a quantidade que deseja?";
		$resposta->source = "webhook";
		$resposta->contextOut['name'] = "needQuant";
		$resposta->contextOut['lifespan'] = 1;
		$resposta->contextOut['parameters'] = $parametros;
		return json_encode($resposta);
	}
	if(!isset($tipo)){
		$resposta->speech = "Falta nome de alimento";
		$resposta->displayText = "Você poderia inserir o tipo de alimento que deseja?";
		$resposta->source = "webhook";
		$resposta->contextOut['name'] = "needTipo";
		$resposta->contextOut['lifespan'] = 1;
		$resposta->contextOut['parameters'] = $parametros;
		return json_encode($resposta);
	}
}
else{
	return "Metódo não permitido.";
}

?>