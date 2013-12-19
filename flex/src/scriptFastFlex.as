include "icones.as";
import Login;

import flexmdi.containers.MDIWindow;
import flexmdi.effects.effectsLib.MDIVistaEffects;

import manterProduto;
import pesquisaProduto;
import manterVenda;

import mx.controls.Alert;
import mx.events.MenuEvent;
import mx.managers.PopUpManager;

private function chamaLogin():void
{
	var popup_login:Login = new Login();
	PopUpManager.addPopUp(popup_login,this,true);  
	PopUpManager.centerPopUp(popup_login);            					
}
private function itemClick(event:MenuEvent):void 
{
	
	if(event.item.@data == "manterProduto")
	{	
		var win:manterProduto = new manterProduto();
		MDICanvas.effectsLib = MDIVistaEffects;
		MDICanvas.windowManager.add(win);	
	}
	if(event.item.@data == "manterVenda")
	{	
		var win1:manterVenda = new manterVenda();
		MDICanvas.effectsLib = MDIVistaEffects;
		MDICanvas.windowManager.add(win1);  	
	}
	if(event.item.@data == "manterTipo")
	{	
		var win2:manterTipoFuncionario = new manterTipoFuncionario();
		MDICanvas.effectsLib = MDIVistaEffects;
		MDICanvas.windowManager.add(win2);	
	}
	if(event.item.@data == "manterCliente")
	{	
		var win3:manterCliente = new manterCliente();
		MDICanvas.effectsLib = MDIVistaEffects;
		MDICanvas.windowManager.add(win3);	
	}
	if(event.item.@data == "manterFornecedor")
	{	
		var win4:manterFornecedor = new manterFornecedor();
		MDICanvas.effectsLib = MDIVistaEffects;
		MDICanvas.windowManager.add(win4);	
	}
	if(event.item.@data == "manterFuncionario")
	{	
		var win5:manterFuncionario = new manterFuncionario();
		MDICanvas.effectsLib = MDIVistaEffects;
		MDICanvas.windowManager.add(win5);	
	}
	if(event.item.@data == "pesquisaProduto")
	{	
		var win6:pesquisaProduto = new pesquisaProduto();
		MDICanvas.effectsLib = MDIVistaEffects;
		MDICanvas.windowManager.add(win6);	
	}
	if(event.item.@data == "pesquisaVenda")
	{	
		var win7:pesquisaVenda = new pesquisaVenda();
		MDICanvas.effectsLib = MDIVistaEffects;
		MDICanvas.windowManager.add(win7);	
	}
}
