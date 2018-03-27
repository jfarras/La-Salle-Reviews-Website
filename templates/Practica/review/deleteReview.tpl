{$modules.head}
{if $error}
    <p>{$error}</p>
{else}
    <h1>Delete Review</h1>
    <p><strong>Review:</strong> {$title}</p>
    <p>Are you sure?</p>
    <form method="post">
        <input type="radio" name="confirm" value="Yes" checked="true">Yes<br>
        <input type="radio" name="confirm" value="No">No<br>
        <input type="submit" name="submitConfirm" value="Confirm">
    </form>
{/if}
{$modules.footer}