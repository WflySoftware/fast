<?php
class TipoFuncionario extends Zend_Db_Table_Abstract
{
    protected $_name = 'tipo_funcionario';   
    
    protected $_dependentTables = array('Funcionario');
}