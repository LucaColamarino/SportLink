function load_creation_buttons(){
var pallavolobtn = $("#Pallavolo");
pallavolobtn.click(open_creation_form);
var calcio_a_5_btn = $("#calcio_a_5");
calcio_a_5_btn.click(open_creation_form);
var calcio_a_8_btn = $("#calcio_a_8");
calcio_a_8_btn.click(open_creation_form);
var tennisbtn = $("#Tennis");
tennisbtn.click(open_creation_form);
var tennisbtn = $("#Baseball");
tennisbtn.click(open_creation_form);
var tennisbtn = $("#beach_volley");
tennisbtn.click(open_creation_form);
var tennisbtn = $("#Padel");
tennisbtn.click(open_creation_form);
}

function open_creation_form(e){
  var sport= e.target.id;
  var today = new Date();
  var time= today.getHours() + ":";

  if(today.getMinutes()<10)time+="0";
  time+=today.getMinutes();
  var icon=sport;
  var mytitle=sport;
  if(sport=="beach_volley"){icon="Pallavolo"; sport="beach_volley";mytitle="Beach Volley";}
  if(sport=="calcio_a_5") {icon="calcio"; sport="calcio_a_5";mytitle="Calcio a 5";}
  else if(sport=="calcio_a_8") {icon="calcio"; sport="calcio_a_8";mytitle="Calcio a 8";}
  Swal.fire({
        title: mytitle,
        html: `
        <form name="ResearchForm" method="POST" class="form-signup m-auto" >
        <input class=" form-select text-center" name="inputSport" value=`+sport+` hidden>

        <input type="number" placeholder="numero giocatori presenti" name="inputNumber" class="form-control form-control-lg" required>
        <input id="match_location" class="form-control" name="autocompleted" placeholder="inserisci il luogo">
        <input id="location" type="hidden" name="inputLocation" required>
        <input type="date" placeholder="Date" name="inputDate"  class="form-control form-control-lg" required>
        <input type=time id="appt" placeholder="Orario" name="inputTime" class="form-control form-control-lg" value="`+time+`"required>
        <button type="submit" name="ressubmit" class="btn lrose_btn btn-lg">Trova i tuoi compagni!</button>  <br>
        

        </form>
        
        
        `,

      iconHtml: '<img src="./Media/'+icon+'.png" style=" width: 100px; height: 100px;">',
      showConfirmButton: false,
      customClass: {
        icon: 'no-border'}
      });
      autocomplete(); 
      
}

function autocomplete(){
  const options = {componentRestrictions: { country: "it" }};  

var autocomplete = new google.maps.places.Autocomplete((document.getElementById("match_location")),options);
google.maps.event.addListener(autocomplete,"place_changed",function(){
    var match_location = autocomplete.getPlace();
    var match_address= match_location.formatted_address;
    $("#location").val(match_address);
});  
}