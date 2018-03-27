
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
                            <div class="rating">&#x2605;{$i.points}/10</div>
                        </td>
                    </tr>
                </table>
            </li>
            {/foreach}
        </ul>
