<?php

//Adiciona o autoloader do Zend Framework
require_once "Zend/Loader/Autoloader.php";
Zend_Loader_Autoloader::getInstance()->setFallbackAutoloader(true);

//Instancia o servidor PHP
$server = new Zend_Amf_Server();

//Conecta no banco de dados
$db = new Zend_Db_Adapter_Pdo_Mysql(array(
    'host'     => '127.0.0.1',
    'username' => 'root',
    'password' => '',
    'dbname'   => 'fastway'
));
//Relaciona o Zend_DB_Table � conex�o
Zend_Db_Table::setDefaultAdapter($db); 


//Habilita o modo de desenvolvimento, retornando mensagens de erro 
// Comente esta linha quando estiver em modo de produ��o
$server->setProduction(true);

//Adiciona o controller php para que as classes sejam encontradas pelo flex
$server->addDirectory(dirname(__FILE__) ."/../php/controller/");

//O model � acessado pelo controller e n�o pelo flex
set_include_path(dirname(__FILE__) . '/../php/model' . PATH_SEPARATOR .get_include_path());
set_include_path(dirname(__FILE__) . '/../php/controller' . PATH_SEPARATOR .get_include_path());

//handle ir� chamar a classe do controller e renderizar a sa�da AMF 
//para o Flex
echo $server->handle();

//n�o precisa fechar a tag PHP. � uma pr�tica recomendada pela Zend!  


