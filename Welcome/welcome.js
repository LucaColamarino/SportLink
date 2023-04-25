var bottone = document.getElementById("Matchesbtn");
bottone.onclick = caricaMatches;
var bottone = document.getElementById("Researchbtn");
bottone.onclick = caricaResearch;

function caricaMatches(e)
{
    var httpRequest = new XMLHttpRequest();
httpRequest.onreadystatechange = gestisciResponse;
httpRequest.open("GET","Matches/index.php", true);
httpRequest.send();

}
function caricaResearch(e)
{
    var httpRequest = new XMLHttpRequest();
httpRequest.onreadystatechange = gestisciResponse;
httpRequest.open("GET","StartResearch/index.php", true);
httpRequest.send();

}


function gestisciResponse(e) {
if (e.target.readyState == 4 && e.target.status == 200) {
document.getElementById("core").innerHTML
= e.target.responseText;
}
}
