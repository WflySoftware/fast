<?php
class ProdutoController extends ControllerBase{
	function __construct(){
		parent::__construct();
	}
	
	public function Salvar($produto){
		
		$produtoTabela = new Produto();
		
		$precoCustoNaoFormatado = $produto->preco_custo;
		$precoVendaNaoFormatado = $produto->preco_venda;
		
		unset($produto->preco_custo);
		unset($produto->preco_venda);
		
		$produto->preco_custo =  Zend_Locale_Format::getFloat($precoCustoNaoFormatado,
                                       array('precision' => 2,
                                             'locale' => 'de_AT')
                                      );
		$produto->preco_venda =  Zend_Locale_Format::getFloat($precoVendaNaoFormatado,
                                       array('precision' => 2,
                                             'locale' => 'de_AT')
                                      );
		
		if ($produto->id_produto != null){
			$id = $produto->id_produto;
			unset($produto->id_produto);
			
			$produtoTabela->update((array)$produto,"id_produto=$id");
			
		}
		else {
			unset($produto->id_produto);
			$produtoTabela->createRow((array)$produto)->save();
		}
		
		return $produtoTabela->fetchRow("codigo_barras = '$produto->codigo_barras'")->toArray();
	}
	
	public function ListarTodos(){
		$produtoTabela = new Produto();
		return $produtoTabela->fetchAll($produtoTabela->select())->toArray();
	}
	
	public function Deletar($id){
		$produtoTabela = new Produto();
		$produtoTabela->delete("id_produto=$id");
	}
	
	public function ProdutoExiste($codigo){
		$produtoTabela = new Produto();
		$row = $produtoTabela->fetchRow("codigo_barras = '$codigo'");
		return $row!=null;
	}
	
	public function PesquisarPorDescricao($descricao){
		$descricaoCodificada = utf8_decode($descricao);
		$produtoTabela = new Produto();
		$row = $produtoTabela->fetchRow("descricao LIKE '%$descricao%'");
		if($row!=null){
			return $produtoTabela->fetchAll($produtoTabela->select()->where("descricao LIKE '%$descricao%'"))->toArray();
		}else{
			return "nao foi";
			//return !$row!=null;
		}
	}
	
	public function PesquisarPorCodigo($codigo){
		$produtoTabela = new Produto();
		$row = $produtoTabela->fetchRow("codigo_personalizado = $codigo");
		if($row!=null){
			return $produtoTabela->fetchRow("codigo_personalizado = $codigo")->toArray();
		}else{
			return !$row!=null;
		}
	}
	
}