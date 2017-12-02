<?php


// verifica se os parametros estao setados e os copia
function getParametros(){
	if(isset($json->result->parameters['alimento-origem'])){
		$alimento_origem = $json->result->parameters['alimento-origem'];
		$parametros['alimento-origem'] = $alimento_origem;
	}
	if(isset($json->result->parameters['alimento-destino'])){
		$alimento_destino = $json->result->parameters['alimento-destino'];
		$parametros['alimento-destino'] = $alimento_destino;
	}
	if(isset($json->result->parameters['quant'])){
		$quant = $json->result->parameters['quant'];
		$parametros['quant'] = $quant;
	}
	if(isset($json->result->parameters['tipo'])){
		$tipo = $json->result->parameters['tipo'];
		$parametros['tipo'] = $tipo;
	}
}

$method = $_SERVER['REQUEST_METHOD'];
$alimento_origem = "";
$alimento_destino = "";
$quant = "";
$tipo = "";
$parametros = [];

//Processa apenas se for post
if($method == "POST"){
	$requisicao = file_get_contents('php://input');
	$json = json_decode($requisicao);

	$resposta = new \stdClass();

	getParametros();

	if($alimento_origem != ""){
		$resposta->speech = "Falta nome de alimento";
		$resposta->displayText = "Você poderia inserir o nome do alimento origem que deseja?";
		$resposta->source = "webhook";
		$resposta->contextOut['name'] = "needOrigem";
		$resposta->contextOut['lifespan'] = 1;
		$resposta->contextOut['parameters'] = $parametros;
		return json_encode($resposta);
	}
	if($alimento_destino != ""){
		$resposta->speech = "Falta nome de alimento";
		$resposta->displayText = "Você poderia inserir o nome do alimento destino que deseja?";
		$resposta->source = "webhook";
		$resposta->contextOut['name'] = "needDestino";
		$resposta->contextOut['lifespan'] = 1;
		$resposta->contextOut['parameters'] = $parametros;
		return json_encode($resposta);
	}
	if($quant != ""){
		$resposta->speech = "Falta nome de alimento";
		$resposta->displayText = "Você poderia inserir a quantidade que deseja?";
		$resposta->source = "webhook";
		$resposta->contextOut['name'] = "needQuant";
		$resposta->contextOut['lifespan'] = 1;
		$resposta->contextOut['parameters'] = $parametros;
		return json_encode($resposta);
	}
	if($tipo != ""){
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