$( document ).ready(function (){
    $("#back_btn").click(function(){
        $.ajax({
            method: "GET",
            data: { 
                match_id:match,
            },
            url: "mymatches.php",  
            async: true,
            success: function(risposta){
            $("#core").html(risposta);
            var chatbtn = $(".chatbtn");
            chatbtn.click(caricaChat);
            return;
            }
      });
    });
    $("#msg_submit").click( function(){
        $.post($("#chat_form").attr("action"),
                $("#chat_form :input").serializeArray(),
            function(info){
                $("#inputmsg").val("");
            });
    
        $("#chat_form").submit(function(){
            return false;
        });
    });
    var match=$('#match_id').text();
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
  });    
    
    
} );




