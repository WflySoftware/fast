<?php
class Cliente extends Zend_Db_Table_Abstract
{
    protected $_name = 'cliente';   
    
    protected $_dependentTables = array('Venda');
    
    protected $_referenceMap = array(
    	'Estado'=> array(
    		'columns' => array('estado_id_estado'),
    		'refTableClass' => array('Cliente'),
    		'refColumns' => array('id_estado')
    	)    
    );
}