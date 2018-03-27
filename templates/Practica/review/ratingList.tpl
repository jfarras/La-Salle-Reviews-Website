{$modules.head}
{if $error}
    <p>{$error}</p>
{else}
    <div class="panel">
        <div class="header">Rating reviews list</div>
        {if $noLogin}
            <div class="noLogin">
                <p>You are not logged in. Please Log In to rate reviews or register if you don't have an account.</p>
                <a href="{$url.global}/logIn/void">Log In</a>
                <a href="{$url.global}/signUp">Sign Up</a>
            </div>
        {/if}
        {if $noReviews}
            <p>{$noReviews}</p>
        {else}
            <ul class="listReviews">
                {foreach from=$reviews item=i}
                    <li class="listEntry">
                        <table>
                            <tr>
                                <td>
                                    <img src="/Practica/img_uploads/small_{$i.review.image}">
                                </td>
                                <td class="content">
                                    <a href="/r/{$i.review.url}" class="title">{$i.review.title}</a><br/>
                                    <div class="desc">{$i.review.description}</div>
                                </td>
                                <td class="rateValue">
                                    <p><strong>Total Points:</strong> {$i.globalPoints}</p>
                                </td>
                                <td class="rateValue">
                                    <p><strong>Num rates:</strong> {$i.ratingNum}</p>
                                </td>
                                <td class="rateValue">
                                    <p><strong>Your points:</strong> {$i.givenPoints}</p>

                                </td>
                                <td class="rateValue">
                                    <p><strong>Rating date:</strong> {$i.ratingDate}</p>
                                </td>
                                <td class="rateValue">
                                {if $i.deleteLink}
                                    <td class="rateValue">
                                        <a href="/rd/{$i.review.url}">Delete rate</a>
                                    </td>
                                {/if}
                            </tr>
                        </table>
                    </li>
                {/foreach}
            </ul>
        {/if}
    </div>
    <div class="navBtns">
        {if $prev}
            <a href="{$url.global}/Rating/{$offset-1}" class="prevbtn"><img src="/Practica/imag/prevButton.png"></a>
        {/if}
        {if $next}
            <a href="{$url.global}/Rating/{$offset+1}" class="nextbtn"><img src="/Practica/imag/nextButton.png"></a>
        {/if}
    </div>
{/if}

<script src="Practica/js/jquery-1.11.0.min.js"></script>
<script src="Practica/js/nicEdit.js"></script>

{$modules.footer}