
<?php
if(isset($_SESSION["error"])){

    switch($_SESSION["error"])
    
    {
        case "1":
            echo '<script type="text/javascript">',
            'error_1();',
            '</script>';
              
            break;

        case "2":
                echo '<script type="text/javascript">',
                'error_2();',
                '</script>';
                break;
        case "3":
                echo '<script type="text/javascript">',
                'error_3();',
                '</script>';
                break;
        case "4":
            echo '<script type="text/javascript">',
            'error_4();',
            '</script>';
            break;
            
    }
    
    
    
}
if(isset($_SESSION["done"]))
{
    switch($_SESSION["done"])
    
    {
        case "1":
            echo '<script type="text/javascript">',
            'done_1();',
            '</script>';
              
            break;
        case "2":
            echo '<script type="text/javascript">',
            'done_2();',
            '</script>';
              
            break;
        case "3":
                echo '<script type="text/javascript">',
                'done_3();',
                '</script>';
                  
                break;
            
    }

}

?>

