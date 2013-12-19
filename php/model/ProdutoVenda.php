<?php
class ProdutoVenda extends Zend_Db_Table_Abstract
{
    protected $_name = 'produto_venda';   

    protected $_referenceMap = array
    (
        'Produto'=> array(
    		'columns' => array('produto_id_produto'),
    		'refTableClass' => array('Produto'),
    		'refColumns' => array('id_produto')
    	),  
        'Venda'=> array(
    		'columns' => array('venda_id_venda'),
    		'refTableClass' => array('Venda'),
    		'refColumns' => array('id_venda')
    	)
    );
}