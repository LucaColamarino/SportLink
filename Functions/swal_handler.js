

function error_1()
{
  fire("Prenotazione Fallita","Troppi Giocatori per lo Sport Selezionato","error");

}
function error_2()
{
  fire("Prenotazione Fallita","Il Numero di Giocatori deve essere maggiore o uguale a 1","error");
}
function error_3()
{
  fire("Prenotazione Fallita","Squadra già al Completo!","error");
}
function error_4()
{
  fire("Prenotazione Fallita","Non puoi creare una partita per il giorno attuale o un giorno passato","error");
}
function done_1()
{
  fire("Ricerca Avviata","La Ricerca è stata avviata con successo!","success");
}
function done_2()
{
  fire("Prenotazione Effettuata","Prenotazione avvenuta con successo!","success");

}

function done_3()
{
  fire("Prenotazione Annullata","Prenotazione annullata con successo!","success");
}
function fire(title,text,icon)
{
  Swal.fire({
    title: title,
    text: text,
    icon: icon,
    confirmButtonColor: "#8CD4F5",
  });
}