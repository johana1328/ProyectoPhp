function redirect(url){
	var formulario= document.getElementById("redirect");
	formulario.action=url;
	formulario.submit();
}