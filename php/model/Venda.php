<?php
class Venda extends Zend_Db_Table_Abstract
{
    protected $_name = 'venda';   
    
    protected $_dependentTables = array('ProdutoVenda');
    
    protected $_referenceMap = array(
    	'Funcionario'=> array(
    		'columns' => array('funcionario_id_funcionario'),
    		'refTableClass' => array('Funcionario'),
    		'refColumns' => array('id_funcionario')
    	)  
    );
}