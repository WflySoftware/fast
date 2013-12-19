<?php
class TipoFuncionarioController extends ControllerBase{
	function __construct(){
		parent::__construct();
	}
	
	public function Salvar($tipo){
		$tipoTabela = new TipoFuncionario();
		
		if ($tipo->id_tipo_funcionario != null){
			$id = $tipo->id_tipo_funcionario;
			unset($tipo->id_tipo_funcionario);
			
			$tipoTabela->update((array)$tipo,"id_tipo_funcionario = $id");
			
		}
		else {
			unset($tipo->id_tipo_funcionario);
			$tipoTabela->createRow((array)$tipo)->save();
		}
		
		return $tipoTabela->fetchRow("tipo LIKE '%$tipo->tipo%'")->toArray();
	}
	
	public function ListarTodos(){
		$tipoTabela = new TipoFuncionario();
		return $tipoTabela->fetchAll($tipoTabela->select())->toArray();
	}
	
	public function Deletar($id){
		$tipoTabela = new TipoFuncionario();
		$tipoTabela->delete("id_tipo_funcionario=$id");
	}
	
	public function TipoExiste($tipo){
		$tipoTabela = new TipoFuncionario();
		$row = $tipoTabela->fetchRow("tipo LIKE '%$tipo%'");
		return $row!=null;
	}
}