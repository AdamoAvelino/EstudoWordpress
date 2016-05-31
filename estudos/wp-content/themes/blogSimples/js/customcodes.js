(function() {
tinymce.create('tinymce.plugins.my_button_script', {
init : function(ed, url) {
ed.addButton('meu_botao', {
title : 'Shortcode de citação',
image : url+'/sucesso30.png',
onclick : function() {
	var titulo = 'Shortcode Blockquote'
	base_inter(titulo);
	short_cite(ed);
}
});
ed.addButton('outro_botao', {
title : 'Short code mensagem',
image : url+'/atencao30.png',
onclick : function() {
ed.selection.setContent('[box_msg type="" ][/box_msg]');
}
});
// mais botões
},
createControl : function(n, cm) {
return null;
},
});
tinymce.PluginManager.add('my_button_script', tinymce.plugins.my_button_script);
})();

//----------------inclui div base para configuração dos shortcodes 
function base_inter(titulo)
{
	var base = '';
	base += '<style type="text/css">#base-short{';
	base += 'position: absolute;z-index: 10;display:none;background: rgba(0,0,0,0.8)}';
	base += '#container-interface-short{';
	base += 'width: 30%; margin: 130px auto; background: #ccc}';
	base += '#header-interface-short{';
	base += 'display:table; width:100%; border-bottom: 1px dotted #000; padding:5px 0;}';
	base += '#header-interface-short a {';
	base += 'float: right; margin-right: 5px; padding: 0 5px; border: 1px solid #000; color: #000; border-radius: 50%; text-decoration: none}';
	base += '#content-interface-short{padding: 20px}</style>';
	
	base += '<div id="base-short">';
	base += '<div id="container-interface-short">';
	base += '<div id="header-interface-short">';
	base +=	'<a href="#" onclick="fecha_janela()" style="float:right">X</a> </div>';
    base += '<div id="content-interface-short"></div></div></div>';
	alert(titulo)
	jQuery('body').prepend(base);
	jQuery('<span style="margin-left: 10px">'+titulo+'</span>').appendTo('#header-interface-short');
	var shortHeight = jQuery(document).height();
	var shortWidth = jQuery(window).width();
	jQuery('#base-short').css({'width' : shortWidth, 'height' : shortHeight});
	jQuery('#base-short').fadeTo('slow', 1)
}


//Função para fechar a janela da interface do shortcode
function fecha_janela()
{
	jQuery('#base-short').remove();
}

function short_cite(objeto)
{
	var cite_code = '';
	cite_code += '<label>Escreva o texto</label><br>';
    cite_code += '<input type="text" id="short-content-cite"><br><br>';
    cite_code += '<input type="button" id="configure" value="incluir">';
	
	jQuery('#content-interface-short').prepend(cite_code);
	
	jQuery('#configure').click(function(){
			var content_cite = document.getElementById('short-content-cite').value;
			objeto.selection.setContent('[cite]'+ content_cite +'[/cite]');
			fecha_janela();
		});
}
