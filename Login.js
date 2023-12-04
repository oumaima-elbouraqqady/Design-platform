var email=document.forms['email'];
var password=document.forms['password'];

var email_errr=document.getElementById('email_error');
var pass_error=document.getElementById('pass_error');

email.addEventListenner('textInput',email_Verify);
password.addEventListenner('textInput',pass_Verify);

function validated(){
    if(email.value.lenght<9){
        
    }
}

function email_Verify(){
    if(email.equam)
}