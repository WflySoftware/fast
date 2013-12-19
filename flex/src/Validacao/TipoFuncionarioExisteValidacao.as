package Validacao{
	import mx.validators.ValidationResult;
	import mx.validators.Validator;
	
	public class TipoFuncionarioExisteValidacao extends Validator{
		
		public function TipoFuncionarioExisteValidacao(){
			super();
		}
		
		private var results:Array;
		
		override protected function doValidation(isValid:Object):Array{
			
			results = new Array();
			
			if(isValid){
				results.push(new ValidationResult(true,null,"NaN","Tipo já cadastrado"));
			}
			
			return results;
		}
	}
}