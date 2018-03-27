{$modules.head}
{if $error}
    <p>{$error}</p>
{else}
    <div class="panel">
        <div class="header">Reviews list (page {$offset})</div>
        <ul class="listReviews">
            {foreach from=$reviews item=i}
                <li class="listEntry">
                    <table>
                        <tr>
                            <td>
                                <img src="/Practica/img_uploads/small_{$i.image}">
                            </td>
                            <td class="content">
                                <a href="/r/{$i.url}" class="title">{$i.title}</a><br/>
                                <div class="desc">{$i.description}</div>
                            </td>
                            <td class="data">
                                <a href="{$url.global}/e/{$i.url}">Edit</a>
                                <a href="{$url.global}/d/{$i.url}">Delete</a>
                            </td>
                        </tr>
                    </table>
                </li>
            {/foreach}
        </ul>
    </div>
{/if}
<div class="navBtns">
    {if $prev}
        <a href="{$url.global}/l/{$offset-1}" class="prevbtn"><img src="/Practica/imag/prevButton.png"></a>
    {/if}
    {if $next}
        <a href="{$url.global}/l/{$offset+1}" class="nextbtn"><img src="/Practica/imag/nextButton.png"></a>
    {/if}
</div>
{$modules.footer}