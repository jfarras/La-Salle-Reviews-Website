{$modules.head}

<!-- Això és un comentari HTML -->
{* Això és un comentari en Smarty *}
<div id="success">
    Lista Fotos <br/>
    <a href="{$url.global}">Volver al &iacute;ndice</a>
    <a href="{$url.global}/InsertZoo">Insertar Foto</a>
    <a href="{$url.global}/SelectZoo/0">Ver Fotos</a>
</div>

<div class="block">
    <div class="inner-block">
        {if $flag} <p> {$flag} </p>{/if}
        {$modules.monos}
        <br><hr><br>
        {$modules.ornis}
        <br><hr><br>
        {$modules.marmotas}
    </div>
</div>


<div class="clear"></div>
{$modules.footer}