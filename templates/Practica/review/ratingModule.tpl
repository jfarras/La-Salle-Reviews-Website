<div id="rateReview">
    {if $noLogin}
        <div class="noLogin">
            <p>You are not logged in. Please Log In to rate reviews or register if you don't have and account.</p>
            <a href="/logIn">Log In</a>
            <a href="/signUp">Sign Up</a>
        </div>
    {else}
        <div class="panel">
            <div class="header">Rate this Review</div>
            <p><strong>Total Rate:</strong> {$totalRate}</p>
            <p><strong>Number of Rates:</strong> {$numRates}</p>
            <form id="ratingForm" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <label><strong>Your rate:</strong></label>
                        </td>
                        <td>
                            <input type="text" name="rating" value="{$userRate}">
                        </td>
                    </tr>
                </table>

                <input type="submit" value="Rate" name="rateForm">
            </form>
        </div>
    {/if}
</div>