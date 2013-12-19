package Model
{
	[Bindable]
	public class TipoFuncionario extends Model
	{
		public function TipoFuncionario(data:Array=null)
		{
			setData(data);
		}
		
		public var id_tipo_funcionario:int;
		public var tipo:String;
	}
}