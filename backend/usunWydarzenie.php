<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Document</title>
</head>
<body>
    <?php
        require('connection.php');                                              
        if (isset($_GET['id'])) {
            $q = "DELETE FROM wydarzenia WHERE id = ".$_GET['id'].";";
            $result = $conn->query($q);                                         
            if ($result){
                echo "Pomyślnie usunięto wydarzenie.";                          
                echo "<script>window.parent.location.reload();</script>";       
            }
            else {
                echo "Błąd przy usuwaniu wydarzenia.";                         
            }
            die();
        }
        else {
            die("Nie podano ID wydarzenia.");
        }
    ?>
</body>