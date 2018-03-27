{$modules.head}

<!-- Això és un comentari HTML -->
{* Això és un comentari en Smarty *}
<div id="success">
    Insertar Fotos Monetes<br/>
    <a href="{$url.global}">Volver al &iacute;ndice</a>
    <a href="{$url.global}/monitosSelect/1">Ver Fotos</a>
</div>

<div class="block">
    <div class="inner-block">
        <h2>Nueva Foto</h2>
        <form method="post">
            Nombre:<input type="text" name="nombre"><br/>
            URL:<input type="text" name="url" value="http://"><br/>
            <input type="submit" name="submit"value="A&ntilde;adir">
        </form>
    </div>
</div>



<div class="clear"></div>
{$modules.footer}