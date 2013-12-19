<?php
class VendaController extends ControllerBase{
	function __construct(){
		parent::__construct();
	}
	
public function Salvar($venda){
		$vendaTabela = new Venda();
		if($venda->id_venda != null){
			$id = $venda->id_venda;
			unset($venda->id_venda);
			$vendaTabela->update((array)$venda ,"id_venda = $id");
			return $vendaTabela->fetchRow("id_venda = $id")->toArray();
		}
		else{
			unset($venda->id_venda);
			unset($venda->forma_pagamento);
			$id_retorno = $vendaTabela->createRow((array)$venda)->save();
			$id_retorno = (int)$id_retorno;
			return $vendaTabela->fetchRow("id_venda = $id_retorno")->toArray();
		}
	}
	
	public function ListarTodos(){
		$vendaTabela = new Venda();
		return $vendaTabela->fetchAll($vendaTabela->select())->toArray();
	}
	
	public function Deletar($id){
		$vendaTabela = new Venda();
		$vendaTabela->delete("id_venda=$id");
	}
	
	public function VendaExiste($id){
		$vendaTabela = new Venda();
		$row = $vendaTabela->fetchRow("id_venda = $id");
		return $row!=null;
	}
	
	public function PesquisarProduto($codigo){
		$produtoTabela = new Produto();
		$row = $produtoTabela->fetchRow("codigo_barras LIKE '%$codigo%'");
		if($row!=null){
			return $produtoTabela->fetchRow("codigo_barras LIKE '%$codigo%'")->toArray();
		}else{
			return !$row!=null;
		}
	}
	
	public function PesquisarPorData($data){
		
	}
	
	public function PesquisarPorFuncionario($id_funcionario){
		
	}
}