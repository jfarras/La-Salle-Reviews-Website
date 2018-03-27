
<h2>Nuevo {$tipo}</h2>
<form method="post">
    <table class="table_animales">
        <tr>
           <td> <label name > Nombre: </label> </td>
           <td> <input type="text" name={$tipo}> </td>
        </tr>
        <tr>
            <td> <label url > URL: </label> </td>
            <td> <input type="text" name="url{$tipo}" value="http://"> </td>
        </tr>
        <tr>
            <td> <input type="submit" name="submit" value="A&ntilde;adir"> </td>
        </tr>
    </table>
</form>


