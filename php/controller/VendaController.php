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
		$vendaTabela = new Venda();
		$row = $vendaTabela->fetchRow("data_venda = '$data'");
		if($row!=null){
			$select = $vendaTabela->select(Zend_Db_Table::SELECT_WITH_FROM_PART);
			$select->setIntegrityCheck(false);
			$select->join("funcionario","funcionario.id_funcionario = venda.funcionario_id_funcionario AND venda.data_venda = '$data'");
			return $vendaTabela->fetchAll($select)->toArray();
		}else{
			return !$row!=null;
		}
	}
	
	public function PesquisarPorFuncionario($id_funcionario){
		$vendaTabela = new Venda();
		$row = $vendaTabela->fetchRow("funcionario_id_funcionario = $id_funcionario");
		if($row!=null){
			$select = $vendaTabela->select(Zend_Db_Table::SELECT_WITH_FROM_PART);
			$select->setIntegrityCheck(false);
			$select->join("funcionario","funcionario.id_funcionario = $id_funcionario AND venda.funcionario_id_funcionario = $id_funcionario");
			return $vendaTabela->fetchAll($select)->toArray();
		}else{
			return !$row!=null;
		}
	}
}