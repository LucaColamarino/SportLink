<?php  
    
    if(isset($_POST["submit"]))
    {   
        
        $email= $_POST["inputEmail"];
        include "../connections.php";



        $query = "SELECT * FROM users where email=$1";
        $result = pg_query_params($dbconn,$query,array($email));
        if($line=pg_fetch_array($result))
        {   
            ?>
            <script>
            email_already_used();
            </script>
            <?php
        }else{
            $pswd= password_hash($_POST["inputPassword"],PASSWORD_DEFAULT);
            $name=$_POST["inputName"];
            $surname=$_POST["inputSurname"];
            $query=" INSERT INTO users (email,pswd,name,surname) VALUES ($1,$2,$3,$4)";
            $result=pg_query_params($dbconn,$query,array($email,$pswd,$name,$surname));
            if($result){
                 ?>
                 <script>
                    reg_completed();
                    
                 </script>
                 <?php
                    header("Location: ../index.php");


                }
        else{die("Errore in registrazione: " . preg_last_error());}
    }
    }
    ?>
