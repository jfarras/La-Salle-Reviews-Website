//Validate Register Form
function registerForm() {
    var aux = document.getElementById('register');
    if(aux.name.value == "" || aux.name.value == null)
    {
        alert("Please provide your name!");
        aux.name.focus();
        return false;
    }
    if(aux.login.value == "" || aux.login.value == null)
    {
        alert("Please provide a login!");
        aux.login.focus() ;
        return false;
    }
    else
    {
        if (aux.login.value.length != 7)
        {
            alert("Please provide a valid login!");
            aux.login.focus();
            return false;
        }
        var result = aux.login.value.match(/[a-z]{2}[0-9]{5}/);
        if (result == null || result[0] != aux.login.value)
        {
            alert("Please provide a valid login");
            aux.login.focus();
            return false;
        }
    }
    if (aux.mail.value == "" || aux.mail.value == null)
    {
        alert("Please provide your e-mail!");
        aux.mail.focus() ;
        return false;
    }
    else
    {
        var atpos=aux.mail.value.indexOf("@");
        var dotpos=aux.mail.value.lastIndexOf(".");
        if(atpos < 1 || dotpos < atpos+2 || dotpos+2 >= aux.mail.value.length)
        {
            alert( "Please provide a valid e-mail!" );
            aux.mail.focus();
            return false;
        }
    }
    if(aux.password.value.length < 6 || aux.password.value.length > 20)
    {
        alert( "Please provide a password between 6-20 characters.");
        aux.login.focus() ;
        return false;
    }
    return true;
}

/* Functions */

function validateReviewSubmition(e){
    e.preventDefault();
    var errors = 0;


    var titleValue = $('input[name=title]').val();
    if(titleValue.length > 100 || titleValue == ''){
        errors++;
        alert('Insert a title with a maximum of 100 characters');
    }

    var subjectValue = $('input[name=subject]').val();
    if(subjectValue.length > 100 || subjectValue == ''){
        errors++;
        alert('Insert the subject');
    }

    var dateValue = $('input[name=date]').val();
    if(dateValue!==''){
        dateValue = new Date(dateValue);
    }else{
        dateValue = false;
    }
    var currentDate = new Date();
    if(!dateValue || dateValue > currentDate){
        errors++;
        alert('Insert a valid date');
    }

    var RatingValue = $('input[name=rating]').val();
    if( RatingValue == '' || parseInt(RatingValue) > 10 || parseInt(RatingValue) < 1 ){
        errors++;
        alert('Rate 1 to 10');
    }

    var descValue = $('textarea[name=description]').val().replace(/\s*\S/g,'');
    if(descValue == ''){
        errors++;
        alert('Insert a description');
    }else{
        $(this).find('[name=description]').val($('.nicEdit-main').html());
    }

    if(errors === 0){
        $(this).unbind('submit').submit();
    }
}

/* Calls */

$('#EditRev').submit(validateReviewSubmition);

