{if !$logged}
    <div id="header_login">

        <form method="post">


            <input type="email" name="mail" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <input type="submit" name="submit" value="Sign In">
            <a href="{$url.global}/signUp">Sign Up</a>

        </form>
    </div>
{else}
    <div id="header_profile">
        <a href="#">{$userName}</a> <span>&#9660;</span>
        <ul>
            <li><a href="/n">Add review</a></li>
            <li><a href="/l/1">My reviews</a></li>
            <li><a href="/logOut">Log Out</a></li>
        </ul>

    </div>

{/if}