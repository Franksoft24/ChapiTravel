// JavaScript Document
//Funciones las cuales voy a necesitar para hacer validaciones mas adelante

function trim(palabra)
{
	var n = palabra.length;
	var p_espacio ="";
	for (var i = 0; i<= n ; i++)
	{
		if (palabra.charAt(i)==" ")
			p_espacio += palabra.charAt(i).replace(" ","");
		else
			p_espacio += palabra.charAt(i);
	}
	return p_espacio;
}

function vacio(i)
{
	var confirmar = trim(i);
	if (confirmar.length < 1){
		return true;
	}else{
		return false;
	}
}
//---------------------------------------------------------------------------

function publicaciones()
{//Cargara las publicaciones que esten en Json a la pagina web
	var posts ="";
	for (var i in post){
		if ((i%2)==0)
			posts += "<div class='post'><h1>"+post[i].Title+"</h1><hr><div class='img'><img alt='"+post[i].IMG+"' width='100%' src='Image/post/"+post[i].IMG+"' height='100%'></div><div class='content'>"+post[i].Content+"</div></div>";
		else 
			posts += "<div class='post2'><h1>"+post[i].Title+"</h1><hr><div class='img'><img alt='"+post[i].IMG+"' width='100%' src='Image/post/"+post[i].IMG+"' height='100%'></div><div class='content'>"+post[i].Content+"</div></div>";
	}
	document.getElementById('post_area').innerHTML=posts;
}
function verify()
{
	var password = document.getElementById('password').value;
	var re_password = document.getElementById('rpassword').value;
	if (password != re_password)
		alert('Las contraseñas no coinsiden.')
		document.getElementById('registrar').disabled=true;
}

window.onload=function()
{//Se haran todas las inyeciones css que sean necesaria para asegurar la integridad de la pagina
	var height = document.getElementById('headerMain').scrollHeight;
	var pageHeight = document.documentElement.clientHeight;
	var heightMenu = pageHeight-height +3;
	height -= 3;
	document.getElementById('menuMain').style.top=height+"px";
	document.getElementById('menuMain').style.height=heightMenu+"px";
}
