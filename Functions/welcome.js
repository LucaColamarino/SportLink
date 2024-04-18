var matchesbtn;
var mymatchesbtn;
var creatematchesbtn;
var logoutbtn;
$( document ).ready(function() {
  matchesbtn = $("#Matchesbtn");
  matchesbtn.click(caricaMatches);
  mymatchesbtn = $("#Mymatchesbtn");
  mymatchesbtn.click(caricaMymatches);
  creatematchesbtn = $("#Creatematchesbtn");
  creatematchesbtn.click(caricaResearch);
  logoutbtn = $("#logoutbtn");
  logoutbtn.click(logout);

  matchesbtnR = $("#MatchesbtnR");
  matchesbtnR.click(caricaMatches);
  mymatchesbtnR = $("#MymatchesbtnR");
  mymatchesbtnR.click(caricaMymatches);
  creatematchesbtnR = $("#CreatematchesbtnR");
  creatematchesbtnR.click(caricaResearch);
  logoutbtnR = $("#logoutbtnR");
  logoutbtnR.click(logout);
  caricaMymatches();
});






function caricaMatches(e)
{
  $.ajax({
    method: "GET",
    url: "matches.php",  
    success: function(risposta){
      $("#core").html(risposta);
      selezionato(matchesbtn,mymatchesbtn,creatematchesbtn);
    }
  });

}

function caricaMymatches()
{
  $.ajax({
    method: "GET",
    url: "mymatches.php",  
    success: function(risposta){
      $("#core").html(risposta);
      selezionato(mymatchesbtn,matchesbtn,creatematchesbtn);
      var chatbtn = $(".chatbtn");
      chatbtn.click(caricaChat);
    }
  });

}

function caricaResearch(e)
{
  $.ajax({
    method: "GET",
    url: "creatematches.php",  
    success: function(risposta){
      $("#core").html(risposta);
      load_creation_buttons();
      selezionato(creatematchesbtn,mymatchesbtn,matchesbtn);
    }
  });
}
function caricaChat(e)
{
$.ajax({
  
  method: "GET",
  data: { 
    match_id:e.currentTarget.id
  },
  url: "chat.php",  
  success: function(risposta){
    $("#core").html(risposta);
  }
});
}

function selezionato(sel,des,des1){
    sel.addClass("selected");
    des.removeClass("selected");
    des1.removeClass("selected");
}

function logout(){
    Swal.fire({
        title: "Sei Sicuro?",
        text: "Stai eseguendo il logout",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Logout",
        confirmButtonColor: '#98c8df',
        cancelButtonText: "Annulla",
        cancelButtonColor: '#d8b995'
      }).then((willDelete) => {
        if (willDelete.value) {
          document.cookie = "name=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
          document.cookie = "surname=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
          document.cookie = "pswd=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
          document.cookie = "avatar=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
          document.cookie = "email=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
          document.cookie = "rememberme=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
          document.location.href = "./index.php";
        }
      });
}





