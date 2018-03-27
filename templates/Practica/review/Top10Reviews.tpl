
        <ul>
            {foreach from=$result item=i}
            <li>
                <table>
                    <tr>

                        <td class="content">

                            <a href="/r/{$i.url}" class="title">{$i.title}</a>
                        </td>
                        <td class="data">
                            <div class="rating">&#x2605;{$i.avg_points }/10</div>
                        </td>
                    </tr>
                </table>
            </li>
            {/foreach}
        </ul>
