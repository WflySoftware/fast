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
	
	public function download( $path, $fileName = '' ){

        if( $fileName == '' ){
            $fileName = basename( $path );
        }

        header("Content-Type: application/force-download");
        header("Content-type: application/octet-stream;");
    	header("Content-Length: " . filesize( $path ) );
    	header("Content-disposition: attachment; filename=" . $fileName );
    	header("Pragma: no-cache");
    	header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
    	header("Expires: 0");
    	readfile( $path );
    	flush();
    }
    
	public function ImprimirCupom($idVenda){
		$vendaTabela = new Venda();
		$item = new ProdutoVenda();
		$dadosVenda = $vendaTabela->fetchRow($vendaTabela->select("id_venda = $idVenda"))->toArray();
		$itens = $item->fetchAll($item->select()->where("venda_id_venda = $idVenda"))->toArray();
		$cupom = fopen('../public_html/temp/ENT.txt','w+');
		fwrite($cupom, "ECF.AbreCupom \r\n");
		for($i=0; $i<count($itens); $i++){
			fwrite($cupom, "ECF.VendeItem(".$itens[$i]['codigo'].",".$itens[$i]['descricao'].",NN,".$itens[$i]['quantidade'].",".$itens[$i]['preco_unitario'].",0,UN,%,D) \r\n");
		}
		fwrite($cupom,"ECF.SubtotalizaCupom(0) \r\n");
		switch($dadosVenda['forma_pagamento']){
			case 'Dinheiro':
				$pagamento = 01;
				break;
			case 'Cheque':
				$pagamento = 01;
				break;
			case 'Cartão de Débito':
				$pagamento = 02;
				break;
			case 'Cartão de Crédito Parcelado':
				$pagamento = 02;
				break;
			case 'Cartão de Crédito A vista':	
				$pagamento = 02;	
				break;	
			default:
				$pagamento = 01;	
		}
		fwrite($cupom,"ECF.EfetuaPagamento(0".$pagamento.",".$dadosVenda['valor_total'].") \r\n");
		fwrite($cupom,"ECF.FechaCupom(Apice Creation Software) \r\n");	
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