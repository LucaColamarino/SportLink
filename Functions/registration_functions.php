

<?php  
    if(isset($_POST["registration_submit"]))
    {   
        $pass1=$_POST["inputPassword"];
        $pass2=$_POST["inputPasswordRep"];
        $avatar=$_POST["avatar"];
        if($pass1 != $pass2){
            echo "<script>different_passwords();</script>";
        }else{
            $email= $_POST["inputEmail"];
            $name=$_POST["inputName"];
            $surname=$_POST["inputSurname"];
            include "./connections.php";
            // check whether the email is already used or not
            $query = "SELECT * FROM users where email=$1";
            $result = pg_query_params($dbconn,$query,array($email));
            if($line=pg_fetch_array($result)){
                echo "<script>email_already_used();</script>";
            }else{
                //crypt the password
                $pswd= password_hash($_POST["inputPassword"],PASSWORD_DEFAULT);
                $query=" INSERT INTO users (email,pswd,name,surname,avatar) VALUES ($1,$2,$3,$4,$5)";
                $result=pg_query_params($dbconn,$query,array($email,$pswd,$name,$surname,$avatar));
                if($result){echo "<script>reg_completed();</script>";
                }else{
                    die("Errore in registrazione: " . preg_last_error());
                }
            }
        }
    }


    
    ?>
