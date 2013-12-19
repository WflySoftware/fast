<?php
class FuncionarioController extends ControllerBase{
	function __construct(){
		parent::__construct();
	}
	
public function Salvar($funcionario){
		$funcionarioTabela = new Funcionario();
		
		if ($funcionario->id_funcionario != null){
			$id = $funcionario->id_funcionario;
			unset($funcionario->id_funcionario);
			
			$funcionarioTabela->update((array)$funcionario,"id_funcionario=$id");
			
		}
		else {
			unset($funcionario->id_funcionario);
			$funcionarioTabela->createRow((array)$funcionario)->save();
		}
		
		return $funcionarioTabela->fetchRow("cpf like '%$funcionario->cpf%'")->toArray();
	}
	
	public function ListarTodos(){
		$funcionarioTabela = new Funcionario();
		return $funcionarioTabela->fetchAll($funcionarioTabela->select())->toArray();
	}
	
	public function Deletar($id){
		$funcionarioTabela = new Funcionario();
		$funcionarioTabela->delete("id_funcionario=$id");
	}
	
	public function FuncionarioExiste($cpf){
		$funcionarioTabela = new Funcionario();
		$row = $funcionarioTabela->fetchRow("cpf like '%$cpf%'");
		return $row!=null;
	}
}