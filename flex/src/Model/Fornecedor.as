package Model
{
	[Bindable]
	public class Fornecedor extends Model
	{
		public function Fornecedor(data:Array=null)
		{
			setData(data);
		}
		
		public var id_fornecedor:int;
		public var nome_fantasia:String;
		public var cnpj:String;
		public var razao_social:String;
		public var inscricao_estadual:String;
		public var estado_id_estado:int;
		public var email:String;
		public var endereco:String;
		public var telefone:String;
		public var celular:String;
		public var cidade:String;
		public var representante:String;
	}
}