<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/kalendarzbgt/styles/style.css">
    <title>Document</title>
</head>
<body>
    <?php                           
        require('connection.php');                                              // Połącznie z bazą danych
        if (isset($_POST['nazwa'])){
            $q = "INSERT INTO zadania(`nazwa`,`data`,`waga`,`kalendarz_id`) VALUES ('".$_POST['nazwa']."','".$_POST['data']."','".$_POST['wagi']."','".$_POST['kalendarz']."')";
            $result = $conn->query($q);                                         //Query dodawania zadania
            if ($result){                                   
                echo "Pomyślnie dodano zadanie.";                               // Sprawdzanie czy query się poprawnie wykonało
                echo "<script>window.parent.location.reload();</script>";       //Powrót na stronę główną w przypadku pomyślnego dodania
            }                                               
            else {                                          
                echo "Błąd przy dodawaniu zadania.";                            // I wyświetlanie stosownej wiadomości
            }                                               
            die();                                          
        }
    ?>
    <form method="post" class="form">
        <label for="nazwa">Nazwa</label>
            <input type="text" name="nazwa" class="form-input" placeholder="Nazwa zadania" required><br>
        <label for="data">Termin</label>
            <input type="date" name="data" class="form-input" required><br>
        <label for="waga">Waga</label>
            <select name="wagi" class="form-input" required>
                <option value="normal">Normalne</option>
                <option value="high">Ważne</option>
                <option value="veryhigh">Bardzo ważne</option>
            </select><br>
        <label for="kalendarz">Kalendarz</label>
            <select name="kalendarz" class="form-input" id="kalendarz" required>
            </select>
        <button type="submit" class="login-form-button" id="important"> <span>Dodaj</span> </button>
    </form>
    <script>
        const kalendarzSelect = document.getElementById('kalendarz');   //Skrypt do wyboru kalendarzy dla obecnego użytkownika
        kalendarze.forEach(element => {
            var option = document.createElement("option");
                option.value = element.id;
            var text = document.createTextNode(element.nazwa);
                option.style.color = element.kolor;
            option.appendChild(text)
                kalendarzSelect.appendChild(option);
        });
    </script>
</body>
</html>
