<?php
class EstadoController extends ControllerBase{
	function __construct(){
		parent::__construct();
	}
	
	public function ListarTodos(){
		$estadoTabela = new Estado();
		return $estadoTabela->fetchAll($estadoTabela->select())->toArray();
	}
}