{$modules.head}

<!-- Això és un comentari HTML -->
{* Això és un comentari en Smarty *}
<div id="success">
    Fotos Monetes<br/>
    <a href="{$url.global}">Volver al &iacute;ndice</a>
    <a href="{$url.global}/monitosInsert">Insertar Foto</a>
</div>

<div class="block">
    <div class="inner-block">
    {   if $nofoto}
        <p>Lo sentimos, no se dispone de la imagen {$id}</p>
    {   else}
        <h2>Mono {$foto.id}</h2>
        <img src="{$foto.url}">
        <p><strong>Nombre:</strong> {$foto.nombre}</p>
    {   /if}
    </div>

    <div class="navBtns">
    {	if $prev}
        <a href="{$url.global}/monitosSelect/{$foto.id-1}" id="prev"><img src="/imag/monos/prev.png"></a>
    {	/if}
    {	if $next}
        <a href="{$url.global}/monitosSelect/{$foto.id+1}" id="next"><img src="/imag/monos/next.png"></a>
    {	/if}
    </div>
</div>

<div class="clear"></div>
{$modules.footer}