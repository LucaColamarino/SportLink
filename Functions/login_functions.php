
<?php  

    
    if(isset($_POST["submit"]))
    {   
        include "./connections.php";

        $email= $_POST["inputEmail"];   
        $pswd= $_POST["inputPassword"];
        $query = "SELECT * FROM users where email=$1";
        $result = pg_query_params($dbconn,$query,array($email));
        if($line=pg_fetch_array($result))
        {   // email matched

           //pswd checking...
            foreach( $line as $etichetta => $valore){
                if($etichetta=="pswd") $hash_pswd=$valore;
                if($etichetta=="name") $name=$valore;
                if($etichetta=="surname") $surname=$valore;
                if($etichetta=="avatar") $avatar=$valore;
                if($etichetta=="id") $id=$valore;
                }
            if(password_verify($pswd,$hash_pswd)){
            //correct pswd
            session_start();
                setcookie("id", $id, time() + (86400 * 30), "/");
                $_SESSION["id"]=$id;
                setcookie("email", $email, time() + (86400 * 30), "/");
                $_SESSION["email"]=$email;
                setcookie("name", $name, time() + (86400 * 30), "/");
                $_SESSION["name"]=$name;
                setcookie("surname", $surname, time() + (86400 * 30), "/");
                $_SESSION["surname"]=$surname;
                setcookie("avatar", $avatar, time() + (86400 * 30), "/");
                $_SESSION["avatar"]=$avatar;
                if(isset($_POST["rememberme"]) && $_POST["rememberme"]=="on"){
                    setcookie("rememberme", "on", time() + (86400 * 30), "/");}

                echo "<script>success_login();</script>";
            }else{
            //wrong pswd
                echo "<script>wrong_pswd();</script>";
                }

        }else{ //email unmatched
            echo "<script>wrong_email();</script>";
        }






    }



        

    ?>