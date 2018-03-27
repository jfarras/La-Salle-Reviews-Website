<!-- falta resize de fotos?? o con la tabla basta? -->

<h2>{$tipo}</h2>

<table class="tabla_fotos">
    <tr>
        <td><p><strong>Nombre:</strong> {$fotos[0].nombre}</p></td>
        <td><p><strong>Nombre:</strong> {$fotos[1].nombre}</p></td>
        <td><p><strong>Nombre:</strong> {$fotos[2].nombre}</p></td>
    </tr>
    <tr>
        <td><img src="{$fotos[0].url}"></td>
        <td><img src="{$fotos[1].url}"></td>
        <td><img src="{$fotos[2].url}"></td>
    </tr>
</table>
<div>

</div>

<div class="clear"></div>