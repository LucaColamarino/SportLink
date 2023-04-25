<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dbconn= pg_connect("host=localhost password=password user=postgres port=5432
                  dbname=AccountsDB") or die("Errore di connessione: " . preg_last_error());
    $query = "SELECT * FROM accounts;";
    $result = pg_query($dbconn,$query);
    echo "<table>";
    $first_line= true;
    while($tuple=pg_fetch_array($result,null,PGSQL_ASSOC) ){
        echo "<tr>";
        if($first_line == true)
        {
            echo "<tr>";
            foreach ($tuple as $colname => $value){
                echo "<th>";
                print $colname;
                echo "</th>";
            }
            echo "</tr>";
            $first_line=false;
        }
        foreach ($tuple as $colname => $value){
            echo "<td>";
            print $value;
            echo "</td>";
        }
        echo "</tr>";

    }
    echo "</table>"
    
    
    
    ?>
</body>
</html>