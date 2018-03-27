<h2>{$tipo}</h2>

{foreach from=$fotos item=i}
    <p><strong>Nombre:</strong> {$i.nombre}</p>
    <a href="{$url.global}/UpdateAnimal/{$table}/{$i.id}">Modificar</a>
    <a href="{$url.global}/DeleteAnimal/{$table}/{$i.id}">Borrar</a>
{/foreach}

<div>

</div>

<div class="clear"></div>
