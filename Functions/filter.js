$("#no_myfilter_btn").click(caricaMymatches);
$("#soccer_myfilter_btn").click(function(){caricafilteredMymatches("Calcio");});
$("#volley_myfilter_btn").click(function(){caricafilteredMymatches("Pallavolo");});
$("#tennis_myfilter_btn").click(function(){caricafilteredMymatches("Tennis");});
$("#baseball_myfilter_btn").click(function(){caricafilteredMymatches("Baseball");});

$("#no_filter_btn").click(caricaMatches);
$("#soccer_filter_btn").click(function(){caricafilteredMatches("Calcio");});
$("#volley_filter_btn").click(function(){caricafilteredMatches("Pallavolo");});
$("#tennis_filter_btn").click(function(){caricafilteredMatches("Tennis");});
$("#baseball_filter_btn").click(function(){caricafilteredMatches("Baseball");});


function caricafilteredMatches(selected_sport)
{
  selezionato(matchesbtn,mymatchesbtn,creatematchesbtn);
  $.ajax({
    method: "GET",
    data: { 
      sport:selected_sport
    },
    url: "matches.php",  
    success: function(risposta){
      $("#core").html(risposta);
    }
  });
}
function caricafilteredMymatches(selected_sport)
{
  selezionato(mymatchesbtn,matchesbtn,creatematchesbtn);
  $.ajax({
    method: "GET",
    data: { 
      sport:selected_sport
    },
    url: "mymatches.php",  
    success: function(risposta){
      $("#core").html(risposta);
      var chatbtn = $(".chatbtn");
      chatbtn.click(caricaChat);
    }
  });
}
