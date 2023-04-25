
<?php  


    if(isset($_POST["submit"]))
    {   
        session_unset();
        session_start();
        include "../connections.php";


        $email= $_POST["inputEmail"];   
        $query = "SELECT * FROM users where email=$1";
        $result = pg_query_params($dbconn,$query,array($email));
        if($line=pg_fetch_array($result))
        {   

           // indirizzo email corretto
           $pswd= $_POST["inputPassword"];
           
           //controllo password...

            foreach( $line as $etichetta => $valore){
                if($etichetta=="pswd") $hash_pswd=$valore;
                if($etichetta=="name") $name=$valore;
                if($etichetta=="surname") $surname=$valore;
            }
            if(password_verify($pswd,$hash_pswd))
            {
            //password corretta
            $_SESSION["email"]=$email;
            $_SESSION["name"]=$name;
            $_SESSION["surname"]=$surname;
            if(   isset($_POST["rememberme"]) && $_POST["rememberme"]=="on") $_SESSION["rememberme"]=$_POST["rememberme"];
            header("Location: ../Welcome/index.php");


            } else{
            //password sbagliata
            ?>
           <script>wrong_pswd();</script>
           <?php
           }

        }else{ //indirizzo email non corretto
            ?>
            <script>wrong_email();</script>
            <?php
        }






    }



        

    ?>