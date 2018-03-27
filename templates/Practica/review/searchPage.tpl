{$modules.head}

{if $issent}
    {if $hasresults}

        <table id="Htable">
            <tr>
                <td>
                    <div class="panel no-height">
                        <div class="header">Search results for "{$query}".</div>
                        <ul>
                            {foreach from=$result item=i}
                                <li>
                                    <table>
                                        <tr>
                                            <td>
                                                <img src="Practica/img_uploads/small_{$i.image}">
                                            </td>
                                            <td class="content">

                                                <a href="/r/{$i.url}" class="title">{$i.title}</a>
                                                <div class="desc">{$i.description}...<a href="/r/{$i.url}">[+more]</a></div>
                                            </td>
                                            <td class="data">
                                                <div class="date">{$i.DateCreation}</div>
                                                <div class="rating">&#x2605;{$i.points }/10</div>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                            {/foreach}
                        </ul>
                    </div>
                </td>
                <td id="Top10"">
                     <div class="panel">
                         <div class="header">Popular Reviews</div>
                         {$modules.modulTop10Reviews}
                     </div>
                </td>
            </tr>
        </table>

        <form method="post" class="pages">
            <input type="hidden" name="currentpage" value="{$offset}">
            <input type="hidden" name="searchquery" value="{$query}">
            {if $prev}
                <input type="submit" name="prev" value="Prev" class="prevbtn">
            {/if}
            {if $next}
                <input type="submit" name="next" value="Next" class="nextbtn">
            {/if}
        </form>


    {else}
        <h2>No results found</h2>
    {/if}

{else}

    <table id="Htable">
        <tr>
            <td>
                <h2>Search</h2>
                {$modules.search}
            </td>
            <td id="Top10">
            <div class="panel">
                <div class="header">Popular Reviews</div>
                {$modules.modulTop10Reviews}
            </div>
            </td>
        </tr>
    </table>

{/if}

{$modules.footer}