
function reload(){
setTimeout(function() {
    var match=$('#match_id').text();
    if ( $( "#msgs" ).length ) {
    $.ajax({
        method: "GET",
        data: { 
            match_id:match,
        },
        url: "chat_core.php",  
        async: true,
        success: function(risposta){
        $("#msgs").html(risposta);
        }
  });}
  }, 200);

}