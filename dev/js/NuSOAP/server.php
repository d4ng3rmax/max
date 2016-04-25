<?php
	require_once('lib/nusoap.php');

	// instanciando um servidor SOAP
	$servidorSoap = new nusoap_server();

	// inicializando suporte ao WSDL
	$servidorSoap->configureWSDL('autenticacaowsdl','urn:autenticacaowsdl');

	// nome do método a ser chamado
	$servidorSoap->register('autenticacao',

	// parâmetros de entrada do método 'autenticacao'
	array('usuario' => 'xsd:string', 'senha' => 'xsd:string'),

	// parâmetros de saída (retorno do método)
	array(
		'return', 'xsd:integer'),				// tipo do retorno (INT)
		'urn:identificacaowsdl', 				// nome de ambiente do webservice (tns)
		'urn:identificacaowsdl#identificacao', 	// URL do serviço
		'rpc', 									// estilo do WSDL, rpc ou document
		'encoded', 								// option SOAP transport
		'retorna 0 ou 1.' 						// documentação
	);

	// definição do método como função PHP
	function autenticacao($login, $senha)
	{
		return (($login == "ricardo") && ($senha == "falasca")) ? 0 : 1;
	}

	// invocando o serviço
	$servidorSoap->service($HTTP_RAW_POST_DATA);
?>