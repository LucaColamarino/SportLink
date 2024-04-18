let max=9;
let i=1;
$( document ).ready(function() {
  $("#Avatar_left").click(function(){i-=1;change_avatar();});
  $("#Avatar_right").click(function(){i+=1;change_avatar();});
  change_avatar(i);
});

function different_passwords(){

swal({
  title: "Registrazione fallita",
  text: "Le due password non coincidono",
  icon: "warning",
  button: "Ok",
});

}

function reg_completed()
{   
    swal({
        title: "Registrazione Completata",
        text: "Registrazione Completata con successo!",
        icon: "success",
        button: "Ok",
      })
      .then((value) => {document.location.href = "./index.php"; });
}

function email_already_used()
{   
    swal({
        title: "Registrazione",
        text: "Esiste già un utente associato a questa email",
        icon: "warning",
        button: "Ok",
      });
}

function change_avatar()
{
  if(i<1) i=max;
  if(i>max) i=1;
  console.log("change_avatar");
  $(".Avatar_img").attr("src","./Media/Avatar"+i+".png");
  $(".avatar").attr("value","./Media/Avatar"+i+".png");
  

}



