{$modules.head}

	<!-- Això és un comentari HTML -->
	{* Això és un comentari en Smarty *}
	<div id="success">
		Bienvenidos a The Monkey Gallery <br/>
		<a href="{$url.global}">Volver al &iacute;ndice</a>
	</div>
	
	<div class="block">
		<div class="inner-block">
		<h2>&Iacute;ndice</h2>
		<h3>Monos Grandes</h3>
			<ul>
				<li><a href="{$url.global}/monitosGrande/1">Mono 1</a></li>
				<li><a href="{$url.global}/monitosGrande/2">Mono 2</a></li>
				<li><a href="{$url.global}/monitosGrande/3">Mono 3</a></li>
			</ul>
		<h3>Monos Pequeños</h3>
			<ul>
				<li><a href="{$url.global}/monitosPequeno/1">Mono 1</a></li>
				<li><a href="{$url.global}/monitosPequeno/2">Mono 2</a></li>
				<li><a href="{$url.global}/monitosPequeno/3">Mono 3</a></li>
				<li><a href="{$url.global}/monitosPequeno/4">Mono 4</a></li>
			</ul>
		<h3>Monos Graciosos</h3>
			<ul>
				<li><a href="{$url.global}/monitosGracioso/1">Mono 1</a></li>
				<li><a href="{$url.global}/monitosGracioso/2">Mono 2</a></li>
				<li><a href="{$url.global}/monitosGracioso/3">Mono 3</a></li>
			</ul>
		</div>
	</div>


	
<div class="clear"></div>
{$modules.footer}