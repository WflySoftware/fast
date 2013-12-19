package Validacao{
	import mx.validators.ValidationResult;
	import mx.validators.Validator;
	
	public class ProdutoExisteValidacao extends Validator{
		
		public function ProdutoExisteValidacao(){
			super();
		}
		
		private var results:Array;
		
		override protected function doValidation(isValid:Object):Array{
			
			results = new Array();
			
			if(isValid){
				results.push(new ValidationResult(true,null,"NaN","Produto já cadastrado"));
			}
			
			return results;
		}
	}
}