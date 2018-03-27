{if $noReviews}
<p>No reviews yet!</p>
{else}

<table class="article">
    <tr>
        <td>
            <div class="title"><a href="/r/{$bestRev.url}">{$bestRev.title}</a></div><br>
            <div class="info">
                <span>By:</span> {$bestRev.author} ({$login})<br>
                <span>Creation Date:</span> {$formatedDate}<br>
                <span>Class Date:</span> {$bestRev.dateClass}<br>
                <span>Subject:</span>{$bestRev.subject}<br>
                &#x2605;{$globalPoints}/10</div>

            <div class="content">

                <img src="/Practica/img_uploads/{$bestRev.image}">
                {$bestRev.description}

            </div>
        </td>
        <td></td>
    </tr>
</table>
{/if}



