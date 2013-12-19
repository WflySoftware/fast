<html>
<head>
	<title> ControllerExplorer </title>
	<style type="text/css">
		body{font-family: Arial;}
	</style>
</head>
<body>
<?php

$dir = "../php/controller";

//Adiciona o autoloader do Zend Framework
require_once "Zend/Loader/Autoloader.php";
Zend_Loader_Autoloader::getInstance()->setFallbackAutoloader(true);

//O model também deve ser verificado
set_include_path(dirname(__FILE__) . '/../php/model' . PATH_SEPARATOR .get_include_path());
set_include_path(dirname(__FILE__) . '/../php/controller' . PATH_SEPARATOR .get_include_path());

echo "Arquivos encontrados em '$dir':<ol>";

//Abre o diretório controller
$controllerDir = opendir($dir);

//Faz um while em todos os arquivos
while (($file = readdir($controllerDir))!==false) {
	
	//Se o arquivo for . ou .., não irá exibí-los 
	if ( ($file == ".") || ($file == "..") )
	{
		continue;
	}
	
	//Exibe o nome do arquivo
	echo "<li> $file <br>";
	
	//Tenta carregar a classe
	//Se der qualquer erro, será exibido imediatamente no browser
	
	//Assumundo que o arquivo é uma classe e possui a extensão .php
	$class = substr($file,0,-4);
	
	//Exibirá informações sobre esta classe 
	echo "<ul>";
	
	echo "<li>Intanciando a classe $class";
	//Tenta instanciar a classe
	$RunClass = new $class;
	echo " [OK] ";
	
	echo "<li>Obtendo métodos:";
	
	echo "<ul>";
	
	$api = new ReflectionClass($class);
	foreach($api->getMethods() as $method)
	{
	    echo "<li> {$method->getName()} ";
	    
	    echo "( ";
	    $virgula = false;
	    foreach($method->getParameters() as $parameter)
		{
			if ($virgula){echo ",";}else{$virgula=true;}
			
			echo "{$parameter->getName()}";	
		}
		echo " )";
	    
	}
	
	echo "</ul>";

	echo "</ul>";
	echo "<br/>";
	
}
?>
</body>
</html>