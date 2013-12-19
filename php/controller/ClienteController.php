<?php
class ClienteController extends ControllerBase{
	function __construct(){
		parent::__construct();
	}
	
public function Salvar($cliente){
		$clienteTabela = new Cliente();
		
		if ($cliente->id_cliente != null){
			$id = $cliente->id_cliente;
			unset($cliente->id_cliente);
			
			$clienteTabela->update((array)$cliente,"id_cliente=$id");
			
		}
		else {
			unset($cliente->id_cliente);
			$clienteTabela->createRow((array)$cliente)->save();
		}
		return $clienteTabela->fetchRow("cpf like '%$cliente->cpf%'")->toArray();
	}
	
	public function ListarTodos(){
		$clienteTabela = new Cliente();
		return $clienteTabela->fetchAll($clienteTabela->select())->toArray();
	}
	
	public function Deletar($id){
		$clienteTabela = new Cliente();
		$clienteTabela->delete("id_cliente=$id");
	}
	
	public function ClienteExiste($cpf){
		$clienteTabela = new Cliente();
		$row = $clienteTabela->fetchRow("cpf like '%$cpf%'");
		return $row!=null;
	}
}