<?php
class Produto extends Zend_Db_Table_Abstract
{
    protected $_name = 'produto';   
    
    protected $_dependentTables = array('ProdutoVenda');
}
