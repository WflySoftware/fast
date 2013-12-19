package Model
{
	[Bindable]
	public class Produto extends Model
	{
		public function Produto(data:Array=null)
		{
			setData(data);
		}
		
		public var id_produto:int;
		public var descricao:String;
		public var codigo_personalizado:int;
		public var unidade_tributada:String;
		public var margem_de_lucro:int;
		public var preco_custo:Number;
		public var preco_venda:Number;
		public var codigo_barras:String;
		public var ncm:String;
		public var execao_ipi:String;
		public var estoque_minimo:int;
		public var quantidade:int;
	}
}