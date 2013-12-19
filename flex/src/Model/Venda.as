package Model
{
	[Bindable]
	public class Venda extends Model
	{
		public function Venda(data:Array=null)
		{
			setData(data);
		}
		
		public var id_venda:int;
		public var funcionario_id_funcionario:int;
		public var data_venda:String;
		public var valor_total:Number;
		public var forma_pagamento:String;
	}
}