{$modules.head}

<!-- Això és un comentari HTML -->
{* Això és un comentari en Smarty *}
<div id="success">
    Insertar Fotos <br/>
    <a href="{$url.global}">Volver al &iacute;ndice</a>
    <a href="{$url.global}/SelectZoo/0">Ver Fotos</a>
    <a href="{$url.global}/ListZoo">Ver Lista</a>
</div>

<div class="block">
    <div class="inner-block">
        {$modules.monos}
        <br><hr><br>
        {$modules.ornis}
        <br><hr><br>
        {$modules.marmotas}
    </div>
</div>


<div class="clear"></div>
{$modules.footer}