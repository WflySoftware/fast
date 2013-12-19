package Model
{
	[Bindable]
	public class Estado extends Model
	{
		public function Estado(data:Array=null)
		{
			setData(data);
		}
		
		public var id_estado:int;
		public var nome:String;
		public var sigla:String;
	}
}