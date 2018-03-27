{$modules.head}

	<!-- Això és un comentari HTML -->
	{* Això és un comentari en Smarty *}
	<div id="success">
		Seccion Monetes {$tipo} <br/>
		<a href="{$url.global}/monitosGrande">Volver al &iacute;ndice</a>
	</div>

	<div class="block">
		<div class="inner-block">
		<h2>Fotos Monetes</h2>
	{	if $desti}
		<p>Este es el mono n&uacute;mero {$numFoto}</p>
		<img src="{$desti}">
	{	else}
		<p>Hola! No puedes ver nuestros monos? </p>
		<p>Utiliza la url de la següent forma:</p>
		<p>{$url.global}/monitos{$tipo}/{$rango}</p>
	{	/if}
		</div>
	</div>
	
<div class="clear"></div>
{$modules.footer}