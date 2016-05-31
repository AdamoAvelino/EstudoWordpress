/*
===============================botão de curtida=====================================
<div id="fb-root"></div>
<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>


=======================================caixa de curtidas==========================
<div id="fb-root"></div>
<div class="fb-like-box" data-href="https://www.facebook.com/pages/A-Festus/496976647085059" data-width="300" data-height="300" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
*/




//-------------------------------------Caixa de curtida-----------------------

(function(d, s, id) 
{
  var js; 
  var fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}
(document, 'script', 'facebook-jssdk'));
/*
------------------------------------caixa de comentario Twiter----------------------
*/
 
!function(d,s,id)
{ 
	var js;
	var fjs=d.getElementsByTagName(s)[0]; 
	var p = /^http:/.test(d.location) ? 'http':'https';
	if(!d.getElementById(id))
	{
		js=d.createElement(s);
		js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js,fjs);
	}
}(document,"script","twitter-wjs"); 

          
