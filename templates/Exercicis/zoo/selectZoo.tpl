{$modules.head}

<!-- Això és un comentari HTML -->
{* Això és un comentari en Smarty *}
<div id="success">
    Fotos Monetes<br/>
    <a href="{$url.global}">Volver al &iacute;ndice</a>
    <a href="{$url.global}/InsertZoo">Insertar Foto</a>
    <a href="{$url.global}/ListZoo">Ver Lista</a>
</div>

<div class="block">
    <div class="inner-block">
        {$modules.monos}
        {$modules.ornis}
        {$modules.marmotas}
    </div>

    <div class="navBtns">
        {if $prev}
        <a href="{$url.global}/SelectZoo/{$offset-1}" id="prev"><img src="/Exercicis/imag/monos/prev.png"></a>
        {/if}
        {if $next}
        <a href="{$url.global}/SelectZoo/{$offset+1}" id="next"><img src="/Exercicis/imag/monos/next.png"></a>
        {/if}
    </div>
</div>

<div class="clear"></div>
{$modules.footer}