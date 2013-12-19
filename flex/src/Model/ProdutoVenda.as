package Model
{
	public class ProdutoVenda extends Model
	{
		public function ProdutoVenda(data:Array=null)
		{
			setData(data);
		}
		
		public var venda_id_venda:int;
		public var produto_id_produto:int;
		public var codigo:int;
		public var descricao:String;
		public var preco_unitario:Number;
		public var quantidade:int;
		public var valor_total:Number;
	}
}