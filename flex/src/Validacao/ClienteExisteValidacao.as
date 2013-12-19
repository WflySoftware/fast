package Validacao{
	import mx.validators.ValidationResult;
	import mx.validators.Validator;
	
	public class ClienteExisteValidacao extends Validator{
		
		public function ClienteExisteValidacao(){
			super();
		}
		
		private var results:Array;
		
		override protected function doValidation(isValid:Object):Array{
			
			results = new Array();
			
			if(isValid){
				results.push(new ValidationResult(true,null,"NaN","Cliente já cadastrado"));
			}
			
			return results;
		}
	}
}