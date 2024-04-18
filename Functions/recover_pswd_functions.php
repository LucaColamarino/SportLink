
<?php  
session_start();
include "../connections.php";
if(isset($_POST["inputEmail"])){
$email=$_POST["inputEmail"];
$query="SELECT count(id) 
        from users
        where email=$1
        group by email";
$result = pg_query_params($dbconn,$query,array($email));   
$line=pg_fetch_array($result);
if($line==NULL) echo "<script>email_not_exists();</script>";
else{

$recover_code=rand(10000,99999);
$_SESSION["recover_code"]=$recover_code;
$_SESSION["email"]=$email;
send_recover_email($email,$recover_code);
echo "<div class=\"mb-3  text-white\">Inserisci il codice che hai ricevuto all'indirizzo: $email</div>";
}
}
if(isset($_POST["inputCode1"])){
    $recover_code=$_SESSION["recover_code"];
    $inserted_code=$_POST["inputCode1"];
    $inserted_code.=$_POST["inputCode2"];
    $inserted_code.=$_POST["inputCode3"];
    $inserted_code.=$_POST["inputCode4"];
    $inserted_code.=$_POST["inputCode5"];
    if($inserted_code!=$recover_code){echo "<p id=\"cod_err\" style=\"color: red\">Il Codice inserito non è corretto!</p>";}
    else{echo "<p style=\"color: green\">Il codice è stato inserito correttamente</p>";}
   
}


if(isset($_POST["inputPassword"]))
    {   
        $email=$_SESSION["email"];
        $pass1=$_POST["inputPassword"];
        $pass2=$_POST["inputPassword2"];
        if($pass1 != $pass2){
            echo "<script>different_passwords();</script>";
        }else{
            $pswd= password_hash($pass1,PASSWORD_DEFAULT);
            $query = "UPDATE users SET pswd=$1 where email=$2";
            $result = pg_query_params($dbconn,$query,array($pswd,$email));
            if($result){echo "<script>pswd_changed();</script>";
            }else{
                die("Errore in registrazione: " . preg_last_error());
            }
        }
    }



function send_recover_email($to,$code)
{
    $subject = "Richiesta di recupero password SportLink";
    $message = "<h1>Recupero Password.</h1>";
    $message .= "<b>
    SportLink ha ricevuto una richiesta di recupero password dell'account collegato con la mail:
    $to </b><br><br>
    Usa questo codice per completare il reset della password:
    <div style=\"font-size:36px;margin-top:20px;line-height:44px\">$code</div>
    ";
    $headers = array("Content-type: text/html; charset=iso-8859-1",
                    "From: colamarino01@gmail.com",
                    "Reply-To: colamarino01@gmail.com",
                    "X-Mailer: PHP/".phpversion()
    );
    $headers = implode("\r\n", $headers);
    
    $retval = mail($to, $subject, $message, $headers);

}
    ?>
