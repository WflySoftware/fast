package Model
{
	[Bindable]
	public class Funcionario extends Model
	{
		public function Funcionario(data:Array=null)
		{
			setData(data);
		}
		
		public var id_funcionario:int;
		public var estado_id_estado:int;
		public var tipo_funcionario_id_tipo_funcionario:int;
		public var nome_funcionario:String;
		public var login:String;
		public var senha:String;
		public var cpf:String;
		public var rg:String;
		public var orgao:String;
		public var data_expedicao:String;
		public var data_nascimento:String;
		public var telefone:String;
		public var celular:String;
		public var endereco:String;
		public var tipo_contrato:String;
		public var data_admissao:String;
		public var salario:Number;		
		public var email:String;
		public var banco:String;
		public var agencia:String;
		public var conta:String;
		public var cidade:String;
		public var uf_orgao:String;
	}
}