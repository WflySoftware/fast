package Model
{
	[Bindable]
	public class Cliente extends Model
	{
		public function Cliente(data:Array=null)
		{
			setData(data);
		}
		
		public var id_cliente:int;
		public var estado_id_estado:int;
		public var nome:String;
		public var cpf:String;
		public var endereco:String;
		public var telefone:String;
		public var email:String;
		public var data_nascimento:String;
		public var cidade:String;
	}
}