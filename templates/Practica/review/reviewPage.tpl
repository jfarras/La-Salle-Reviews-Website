{$modules.head}

<table class="article">
    <tr>
        <td>
            <div class="title">{$title}</div><br>
            <div class="info">
                <span>By:</span> {$author} ({$login})<br>
                <span>Creation Date:</span> {$dateCreation}<br>
                <span>Class Date:</span> {$dateClass}<br>
                <span>Subject:</span> {$subject}<br>
                &#x2605;{$rate}/10</div>
            <div class="content">

                <img src="/Practica/img_uploads/{$image}">
                {$description}

            </div>
        </td>
        <td id="Top10" class="ratingModule">
            {$modules.rating}
            <div id="Top10Block">
                <div class="panel">
                    <div class="header">Popular Reviews</div>
                    {$modules.modulTop10Reviews}
                </div>
            </div>
        </td>

    </tr>
</table>



{$modules.footer}

