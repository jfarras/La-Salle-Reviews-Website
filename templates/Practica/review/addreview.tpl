{$modules.head}
<div id="addR">
    <h2 id="titleAdd"> Add your Review </h2> <hr />
    <form id="EditRev" method="post" enctype="multipart/form-data">

        <table>
            <tr>
                <td><label>Title</label> </td>
                <td><input type ="text" name="title" value="{$fields.title}"> </td>
            </tr>
            {if $koTitle}
                <tr>
                    <td colspan="2" class="formError">{$koTitle}</td>
                </tr>
            {/if}
            <tr>
                <td><label>Subject</label> </td>
                <td><input type="text" name="subject" value="{$fields.subject}"> </td>
            </tr>
            {if $koSubject}
                <tr>
                    <td colspan="2" class="formError">{$koSubject}</td>
                </tr>
            {/if}
            <tr>
                <td><label>Date</label> </td>
                <td><input type="date" name="date" value="{$fields.date}"> </td>
            </tr>
            {if $koDate}
                <tr>
                    <td colspan="2" class="formError">{$koDate}</td>
                </tr>
            {/if}
            <tr>
                <td><Label>Add image</Label></td>
                <td>
                    {if !$imgOK}
                        <input type="file" name="image">
                    {else}
                        <img class="thumb" src="Practica/img_uploads/small_{$imgOK}">
                        <input class="imgCharged" type="file" name="image">
                    {/if}
                    <input type="hidden" name="imagename" value="{$imgOK}">
                </td>
            </tr>
            {if $koImgErrors}
                <tr>
                    <td colspan="2" class="formError">
                        <ul>
                            {if $koImgFile}<li>{$koImgFile}</li>{/if}
                            {if $koImgUpload}<li>{$koImgUpload}</li>{/if}
                            {if $koImgSize}<li>{$koImgSize}</li>{/if}
                            {if $koImgType && !$koImgUpload && !$koImgFile}<li>{$koImgType}</li>{/if}
                        </ul>
                    </td>
                </tr>
            {/if}
            <tr>
                <td><label>Rate</label> </td>
                <td>
                    <input type="text" name="rating" value="{$fields.rating}">
                </td>
            </tr>
            {if $koRate}
                <tr>
                    <td colspan="2" class="formError">{$koRate}</td>
                </tr>
            {/if}
            <tr>
                <td colspan ="2">
                    <label>Description</label><br>
                    <textarea name="description">{$fields.description}</textarea>
                </td>
            </tr>
            {if $koDescription}
                <tr>
                    <td colspan="2" class="formError">{$koDescription}</td>
                </tr>
            {/if}

        </table>

        <input type="submit" value="Save" name="submitForm">
    </form>


</div>

{$modules.footer}