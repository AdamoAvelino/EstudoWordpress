var reEmail = /^.{2,30}@\w{2,30}\.[a-z]{2,5}$|^.{2,30}@\w{2,30}\.[a-z]{2,5}\.[a-z]{2}$/;
var nome;
var email;
var assunto;
var mensagem;
var inv;
var email_invalido = 'nao'
window.onload = function()
{
	
	document.getElementById('btn_enviar').onclick = function()
	{
		inv = document.getElementsByClassName('alerta-form');
		for(var v = 0; inv.length > v; v++)
			{
				
				if(inv[v].getAttribute('class') == 'alerta-form')
				{
					inv[v].setAttribute('class', 'alerta-form invisivel');
				}
				if(inv[v].getAttribute('class') == 'alerta-form invalido')
				{
					inv[v].setAttribute('class', 'alerta-form invisivel invalido');
				}
			}
			
		var alerta = '';
		var permite;
		var erro = 0;
		
		if(document.getElementById('nome').value == '')
		{
			erro++
			alerta += 'nome,';
		}
		else
		{
			nome = document.getElementById('nome').value
		}
		
		if(document.getElementById('email').value == '')
		{
			erro++
			alerta += 'email,';
		}
		else
		{
			
			email = document.getElementById('email').value
			if(reEmail.test(email))
			{
				email = document.getElementById('email').value
			}
			else
			{
				erro++;
				alerta += 'email,';
				email_invalido = 'sim';
			}
			
		}
		
		if(document.getElementById('assunto').value == '')
		{
			erro++
			alerta += 'assunto,';
		}
		else
		{
			assunto = document.getElementById('assunto').value
		}
		
		if(document.getElementById('mensagem').value == '')
		{
			erro++
			alerta += 'mensagem';
		}
		else
		{
			mensagem = document.getElementById('mensagem').value
		}
		
		if(erro > 0)
		{
			var separa = alerta.split(",");
			for(var i = 0; i < separa.length; i++)
			{
				var pai = document.getElementById(separa[i]).parentNode.childNodes;
				
				for(var u = 0; u < pai.length; u++)
				{
					
					if(pai[u].getAttribute('class') == 'alerta-form invisivel')
					{
						pai[u].setAttribute('class', 'alerta-form');
						if(email_invalido == 'sim' && separa[i] == 'email')
						{
							pai[u].setAttribute('class', 'alerta-form invisivel');
							pai[u].nextSibling.setAttribute('class', 'alerta-form invalido');							
							email_invalido = 'nao';
						}
					}
				}
				
			}
		}
		else
		{
			envia_servidor();
		}
	}
}



var ajax;

function requestAjax()
{
	ajax = null;
	if(window.XMLHttpRequest)
	{
		ajax = new XMLHttpRequest();
	}
	else if(window.ActiveXObject)
	{
		try
		{
			ajax = new ActiveXObject('Msxml2.XMLHTTP');
		}
		catch(e)
		{
			try
			{
				ajax = new ActiveXObject('Microsoft.XMLHTTP');
			}
			catch(e)
			{
				ajax = null
			}
		}
	}
}

function envia_servidor()
{
	document.getElementById('img_carrega').removeAttribute('class');	
	var remetente = document.getElementById('remetente').value;
	var email_remetente = document.getElementById('email_remetente').value;
	var destinatario = document.getElementById('destinatario').value;
	var email_destinatario = document.getElementById('email_destinatario').value;
	var uridir = document.getElementById('uriform').value;
	
	var parametro = 'action=siteFsEnviaEmail&nome='+nome+'&email='+email+'&assunto='+assunto+'&remetente='+remetente+'&email_remetente='+email_remetente+'&destinatario='+destinatario+'&email_destinatario='+email_destinatario+'&mensagem='+mensagem; 
	requestAjax();
	ajax.onreadystatechange = recebe_resposta;
	ajax.open('POST', uridir);
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.send(parametro, false);
}

function recebe_resposta()
{
	
	if(ajax.readyState == 4)
	{
		
		if(ajax.status == 200)
		{
			var resposta = ajax.responseText
			if(resposta == 'Enviado0');
			{
				document.getElementById('nome').value = '';
				document.getElementById('email').value = ''
				document.getElementById('assunto').value = ''
				document.getElementById('mensagem').value = ''
				document.getElementById('img_carrega').setAttribute('class', 'invisivel');	
				
			}
		}
	}
}

