function registrationcheck(){
var pass1 = document.RegistrationForm.inputPassword.value;
var pass2 = document.RegistrationForm.inputPasswordRep.value;
if(pass1!=pass2) {alert("Le due password non coincidono!"); return false;}
return true;

}

function reg_completed()
{
    alert("Registrazione Completata con successo!");
}

function email_already_used()
{
    alert("Esiste già un utente associato a questa email");
}