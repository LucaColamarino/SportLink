
$( document ).ready(function() {
    var inputs = Array.prototype.slice.call(document.querySelectorAll('.code_form input'));
    //handle the number input
    inputs.forEach((input) => {
        $(input).keydown(function(e){
            const num = Number(e.key);
            console.log(num);
            if (num && num >= 0 && num <= 9 ) { // Only allow numbers
                input.value=num;
                e.preventDefault();
                focusNext();
            }
    
    
    
        });
        //handle ctl+v
        $(input).bind('paste', function(e) {
            var pastedData = e.originalEvent.clipboardData.getData('text');
            e.preventDefault();
            focusNext_iterative(pastedData);
        }); 
    
    });
    //focus the next input
    function focusNext() {
        const currInput = document.activeElement;
        const currInputIndex = inputs.indexOf(currInput);
        const nextinputIndex =
          (currInputIndex + 1) % inputs.length;
        const input = inputs[nextinputIndex];
        input.focus();
      }
      //used for the paste event
      function focusNext_iterative(str) {
        for(var i=0;i<5;i++){
            var currInput = document.activeElement;
            var num = Number(str[i]);
            if(i<str.length && num >= 0 && num <= 9){
                currInput.value=str[i];
            }else break;
            var currInputIndex = inputs.indexOf(currInput);
            var nextinputIndex =
            (currInputIndex + 1) % inputs.length;
            var input = inputs[nextinputIndex];
            input.focus();
        }
      }
    
    
    
    
    
    
    //email inserted
    $("#recover_submit").click( function(){
    
        $.post($("#form").attr("action"),
                $("#form :input").serializeArray(),
            function(info){
    
                $("#msg_div").empty();
                $("#msg_div").html(info);
                $('#emailid').attr('disabled', 'disabled'); 
                $('#recover_submit').attr('hidden', 'hidden'); 
                $("#code_title").removeAttr('hidden');
                $("#code_form").removeAttr('hidden');
            });
    
        $("#form").submit(function(){
            return false;
        });
    });
    //code inserted
    $("#code_submit").click( function(){
        $.post($("#code_form").attr("action"),
                $("#code_form :input").serializeArray(),
            function(info){
                $("#code_div").empty();
                $("#code_div").html(info);
                if($('#cod_err').length){}else{
                    $("#pswd_form").removeAttr('hidden');
                    $('#codeid1').attr('disabled', 'disabled');
                    $('#codeid2').attr('disabled', 'disabled');
                    $('#codeid3').attr('disabled', 'disabled');
                    $('#codeid4').attr('disabled', 'disabled');
                    $('#codeid5').attr('disabled', 'disabled');
                    $('#code_submit').attr('hidden', 'hidden');  
                }
        });
    
        $("#code_form").submit(function(){
            return false;
        });
    });
    
    
    //pswds inserted
    $("#pswd_submit").click( function(){
        $.post($("#pswd_form").attr("action"),
                $("#pswd_form :input").serializeArray(),
            function(info){
                $("#pswd_div").html(info);
            });
    
        $("#pswd_form").submit(function(){
            return false;
        });
    });
});

function different_passwords(){
    swal({
      title: "Operazione Fallita",
      text: "Le due password non coincidono",
      icon: "warning",
      button: "Ok",
    });
    }

function pswd_changed()
{   
    swal({
        title: "Password Aggiornata",
        text: "Operazione effettuata con successo!",
        icon: "success",
        button: "Ok",}).then((value) => {
          document.cookie = "name=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
          document.cookie = "surname=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
          document.cookie = "pswd=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
          document.cookie = "avatar=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
          document.cookie = "email=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
          document.cookie = "rememberme=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
          document.location.href = "./index.php"; });
}

function email_not_exists(){
    swal({
        title: "Email non associata a nessun utente",
        text: "Riprova con una mail registrata!",
        icon: "warning",
        button: "Ok",
        }).then((value) => {document.location.href = "./recover_pswd.php"; });
}

function wrong_code(){
    swal({
        title: "Il Codice inserito non è corretto",
        text: "Ricontrolla il codice che ti è stato inviato via email",
        icon: "warning",
        button: "Ok",
        });
}