<?php



require_once('lib/nusoap.php');

$proxyhost 		= isset($_POST['proxyhost']) ? $_POST['proxyhost'] : '';
$proxyport 		= isset($_POST['proxyport']) ? $_POST['proxyport'] : '';
$proxyusername 	= isset($_POST['proxyusername']) ? $_POST['proxyusername'] : '';
$proxypassword 	= isset($_POST['proxypassword']) ? $_POST['proxypassword'] : '';
$useCURL 		= isset($_POST['usecurl']) ? $_POST['usecurl'] : '0';

$client = new soapclient('http://treinamento.ipdgvendas.com.br/NuSOAP/modelo.wsdl', true, $proxyhost, $proxyport, $proxyusername, $proxypassword);
$err = $client->getError();

if ($err) {
	echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
}

$client->setUseCurl($useCURL);
$person = array('firstname' => 'Fabi', 'age' => 22, 'gender' => 'female');
$name = array('name' => $person);
$result = $client->call('hello', $name);

if($client->fault)
{
	echo '<h2>Resultado:</h2><pre>';
	print_r($result);
	echo '</pre>';
}
else
{
	$err = $client->getError();
	if ($err) {
		echo '<h2>Error</h2><pre>' . $err . '</pre>';
	} else {
		echo '<h2>Resultado:</h2><pre>';
		print_r($result);
	echo '</pre>';
	}
}


?>
