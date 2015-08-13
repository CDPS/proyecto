//agrega un evento que ejecuta el metodo showUsers al finalizar de cargar todo el html.
document.addEventListener('DOMContentLoaded', function() {
  showUsers();
}, false);


/**
* Retorna un generador de Peticiones HTTP
*/
function getAjax () {
	var xmlhttp;
	if(window.XMLHttpRequest){
	  	// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
  	return xmlhttp;
}


/**
* Funcion que permite crear un usuario nuevo.
*/
function createUser () {
	var name = document.getElementById("name").value;
	var edad =document.getElementById("age").value;
	var username = document.getElementById("username").value;
	if(name=="" || name==null ||edad=="" || edad==null || username=="" || username==null)
	{
		alert("Ingrese datos Validos");
	}else{
		var xmlhttp = getAjax();
		xmlhttp.open("GET", "PHP/createUser.php?name="+name+"&age="+edad+"&username="+username, true);
		xmlhttp.send();	
		xmlhttp.onreadystatechange = function() {
	    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	    	   document.getElementById("respuesta").innerHTML=xmlhttp.responseText;
	    	   showUsers();
	    	}
	    }	

	}
	
}
/**
* funcion que muestra una tabla con todos los usuarios.
*/
function showUsers(){
	var xmlhttp = getAjax();
	xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("usertable").innerHTML= xmlhttp.responseText;
    	}
    }
    xmlhttp.open("GET", "PHP/getUsers.php", true);
	xmlhttp.send();
}