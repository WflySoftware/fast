<?php
class Estado extends Zend_Db_Table_Abstract
{
    protected $_name = 'estado';   
    
    protected $_dependentTables = array('Cliente,Fornecedor,Funcionario');
}