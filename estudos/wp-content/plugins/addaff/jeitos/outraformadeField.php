<?
	//Sem a utilização dos metodos add_settings_section e add_settings_field;
?>
<div class="wrap">
	<h2>Configuração Addaf</h2>
	<p>AddAff ajuda você a gerenciar facilmente links de produtos e adicionar parâmetros da filial para eles. A maioria dos programas de afiliados quero que você fornecer uma seqüência de antes e, por vezes, após o link real do produto.</p>
    <p>Exemplo: <strong> http://aff.com/client/1234/out?= </strong> <em>http://product.com/9876 </em> <strong> &%stringafter </strong></p>
    <p>As peças ousadas da ligação são controlados a partir daqui, a parte em itálico é o link do produto que você fornece em uma base por post.</p>
    
    	<form action="options.php" method="post">
    		<? settings_fields('addaff_setup');?>
        	<? $options = get_option('addaff_option'); ?>
        	<table class="form-table">
            	<tr valign="top">
                	<th scope="row"> 
                    	String que vai <strong>antes</strong> da URL do produto
                    </th>
                    <td>
                    	<input type="text" name="addaff_option[urlbefore]" value="<? echo $options['urlbefore']; ?>" class="regular-text code" />
                    </td>
                </tr>
                <tr valign="top">
                	<th scope="row">
                    	String que vai <strong>depois</strong> da URL do produto
                    </th>
                    <td>
                    	<input type="text" name="addaff_option[urlafter]" value="<? echo $options['urlafter']; ?>">
                    </td>
                </tr>
            </table>
            <p class="submit">
            	<input id="submit" type="submit" class="button-primary button" value="<? _e('Salvar Alterações')?>">
            </p>
    	</form>
</div>