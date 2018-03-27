{$modules.head}

<div id="SignUp">
    <form id="register" method="post" onsubmit="javascript:registerForm();" action="">
        <table class="formSignUp">
            <tr>
                <td><label for="name">Name</label></td>

                <td><input type="text" name="name" value="{$name}"></td>
                {if $koDBName}


                    <td> <p>Used name</p> </td>

                {/if}
                {if $koName}


                    <td> <p>Enter a name</p> </td>
                {/if}
            </tr>
            <tr>
                <td><label for="login">Login</label></td>
                <td><input type="text" name="login" value="{$login}"></td>
                {if $koLogin}


                    <td> <p>Wrong code</p> </td>
                {/if}
                {if $koDBLogin}


                    <td> <p>Used login</p> </td>
                {/if}
            </tr>
            <tr>
                <td><label for="mail">Mail</label></td>
                <td><input type="email" name="mail" value="{$mail}"></td>
                {if $koMail}


                    <td> <p>Wrong mail</p> </td>
                {/if}
                {if $koDBMail}


                    <td> <p>Used mail</p> </td>
                {/if}
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" value="{$password}"></td>
                {if $koPass}


                    <td> <p>Wrong Password</p> </td>
                {/if}
            </tr>
            <tr>
                <td colspan="3" id="submit2"><input type="submit" name="submit2" value="Sign Up"></td>

            </tr>
        </table>
        <a href="{$url.global}/logIn"><img style="border:0;" src="/Practica/imag/fb_login.png"

    </form>

</div>

{$modules.footer}