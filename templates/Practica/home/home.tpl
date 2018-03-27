{$modules.head}
{if $welcome}
    <h1>{$welcome}</h1>
{/if}

<table id="Htable">
    <tr>
        <td colspan="3" id="Htop">
            <!-- Best Review -->
            <div class="panel">
                <div class="header">Best Review</div>
                {$modules.modulReview}
            </div>
        </td>
    </tr>
    <tr>
        <td id="Hpict">
            <!-- Pictures -->
            <div class="panel">
                <div class="header">Latest Pictures</div>
                <ul>
                    {foreach from=$result item=i}
                        <li>
                            <img src="Practica/img_uploads/small_{$i.image}">
                            </a>
                        </li>
                    {/foreach}
                </ul>
            </div>
        </td>
        <td id="Hrev">
            <!-- Reviews -->
            <div class="panel">
                <div class="header">Lastest Reviews</div>
                    {$modules.miniReview}
            </div>
            <div class="panel">
                <div class="header">Popular Reviews</div>
                    {$modules.modulTop10Reviews}
            </div>
        </td>
        <td id="Htweet">
            <!-- Twitter -->
            {literal}
                <a class="twitter-timeline" href="https://twitter.com/search?q=%23projectesWeb14" data-widget-id="460373238661406720">Tweets "#projectesWeb14"</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

            {/literal}
        </td>
    </tr>
</table>















{$modules.footer}