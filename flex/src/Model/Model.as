package Model
{
	public class Model
	{
		public function Model()
		{
		}
		
		protected function setData(data:Array=null):void
		{
			if (data != null)
			{
				for (var key:String in data)
				{
					if (this.hasOwnProperty(key))
					{
						this[key] = data[key];	
					}
				}
			}
		}
	}
}