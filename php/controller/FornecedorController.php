<?php
class FornecedorController extends ControllerBase{
	function __construct(){
		parent::__construct();
	}
	
public function Salvar($fornecedor){
		$fornecedorTabela = new Fornecedor();
		
		if ($fornecedor->id_fornecedor != null){
			$id = $fornecedor->id_fornecedor;
			unset($fornecedor->id_fornecedor);
			
			$fornecedorTabela->update((array)$fornecedor,"id_fornecedor=$id");
			
		}
		else {
			unset($fornecedor->id_fornecedor);
			$fornecedorTabela->createRow((array)$fornecedor)->save();
		}
		
		return $fornecedorTabela->fetchRow("cnpj like '%$fornecedor->cnpj%'")->toArray();
	}
	
	public function ListarTodos(){
		$fornecedorTabela = new Fornecedor();
		return $fornecedorTabela->fetchAll($fornecedorTabela->select())->toArray();
	}
	
	public function Deletar($id){
		$fornecedorTabela = new Fornecedor();
		$fornecedorTabela->delete("id_fornecedor=$id");
	}
	
	public function FornecedorExiste($cnpj){
		$fornecedorTabela = new Fornecedor();
		$row = $fornecedorTabela->fetchRow("cnpj like '%$cnpj%'");
		return $row!=null;
	}
}