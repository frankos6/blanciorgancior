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
        require('connection.php');                                              // Połączenie z bazą danych
        if (isset($_POST['nazwa'])) {
            $q = "INSERT INTO kalendarze(`nazwa`,`kolor`,`user_id`) VALUES ('".$_POST['nazwa']."','".$_POST['kolor']."','".$_SESSION['user_id']."')";
            $result = $conn->query($q);                                         //Query dodawania zadania
            if ($result){
                echo "Pomyślnie dodano kalendarz.";                            // Sprawdzanie czy query się poprawnie wykonało
                echo "<script>window.parent.location.reload();</script>";       //Powrót na stronę główną w przypadku pomyślnego dodania
            }
            else {
                echo "Błąd przy dodawaniu klaendarza.";                         // I wyświetlanie stosownej wiadomości
            }
            die();
        }
    ?>
    <form method="post" class="form">
        <label for="nazwa">Nazwa</label>
            <input type="text" name="nazwa" required class="form-input" placeholder="Nazwa Wydarzenia"><br>
        <label for="kolor">Kolor kalendarza</label>
        <input type="color" name="kolor" value="#ffffff">
        <button type="submit" class="login-form-button" id="important"> <span>Dodaj</span> </button>
    </form>
</body>