<?php
class Funcionario extends Zend_Db_Table_Abstract
{
    protected $_name = 'funcionario';

    protected $_dependentTables = array('Venda');
    
    protected $_referenceMap = array(
    	'TipoFuncionario'=> array(
    		'columns' => array('tipo_funcionario_id_tipo_funcionario'),
    		'refTableClass' => array('TipoFuncionario'),
    		'refColumns' => array('id_tipo_funcionario')
    	),
    	'Estado'=> array(
    		'columns' => array('estado_id_estado'),
    		'refTableClass' => array('Cliente'),
    		'refColumns' => array('id_estado')
    	)       
    );
}