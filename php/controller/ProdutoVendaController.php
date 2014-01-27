<?php
class ProdutoVendaController extends ControllerBase{
	function __construct(){
		parent::__construct();
	}
	
	public function Salvar($produtoVenda){
		$produtoVendaTabela = new ProdutoVenda();
		//if (($produtoVenda->produto_id_produto != null) || ($produtoVenda->venda_id_venda != null)) {
			//$produtoVendaTabela->update((array)$produtoVenda,"venda_id_venda = $produtoVenda->venda_id_venda");
			
		//}
		//else {
			
		//}
		$produtoVendaTabela->createRow((array)$produtoVenda)->save();
		
		return $produtoVendaTabela->fetchRow($produtoVendaTabela->select()->where("produto_id_produto = $produtoVenda->produto_id_produto AND venda_id_venda = $produtoVenda->venda_id_venda"))->toArray();
	}
	
	public function ListarTodos(){
		$produtoTabela = new Produto();
		return $produtoTabela->fetchAll($produtoTabela->select())->toArray();
	}
	
	public function Deletar($id){
		$produtoTabela = new Produto();
		$produtoTabela->delete("id_produto=$id");
	}
	
}