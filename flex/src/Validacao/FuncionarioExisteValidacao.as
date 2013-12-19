package Validacao{
	import mx.validators.ValidationResult;
	import mx.validators.Validator;
	
	public class FuncionarioExisteValidacao extends Validator{
		
		public function FuncionarioExisteValidacao(){
			super();
		}
		
		private var results:Array;
		
		override protected function doValidation(isValid:Object):Array{
			
			results = new Array();
			
			if(isValid){
				results.push(new ValidationResult(true,null,"NaN","Funcionario já cadastrado"));
			}
			
			return results;
		}
	}
}