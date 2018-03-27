{$modules.head}

<!-- Això és un comentari HTML -->
{* Això és un comentari en Smarty *}
<div id="success">
    Modificar Foto <br/>
    <a href="{$url.global}">Volver al &iacute;ndice</a>
    <a href="{$url.global}/SelectZoo/0">Ver Fotos</a>
</div>

<div class="block">
    <div class="inner-block">

        <h2>Editar Imagen</h2>
        <form method="post">
            <table class="table_animales">
                <tr>
                    <td> <label name > Nombre: </label> </td>
                    <td> <input type="text" name="nombre"> </td>
                </tr>
                <tr>
                    <td> <label url > URL: </label> </td>
                    <td> <input type="text" name="url" value="http://"> </td>
                </tr>
                <tr>
                    <td> <input type="submit" name="submit" value="EDITAR"> </td>
                </tr>
            </table>
        </form>

    </div>
</div>


<div class="clear"></div>
{$modules.footer}


