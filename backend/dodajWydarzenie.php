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
            $q = "INSERT INTO wydarzenia(`nazwa`,`data`,`powtarzanie`,`kalendarz_id`) VALUES ('".$_POST['nazwa']."','".$_POST['data']."','".$_POST['powtarzanie']."','".$_POST['kalendarz']."')";
            $result = $conn->query($q);                                         //Query dodawania zadania
            if ($result){
                echo "Pomyślnie dodano wydarzenie.";                            // Sprawdzanie czy query się poprawnie wykonało
                echo "<script>window.parent.location.reload();</script>";       //Powrót na stronę główną w przypadku pomyślnego dodania
            }
            else {
                echo "Błąd przy dodawaniu wydarzenia.";                         // I wyświetlanie stosownej wiadomości
            }
            die();
        }
    ?>
    <form method="post" class="form">
        <label for="nazwa">Nazwa</label>
            <input type="text" name="nazwa" required class="form-input" placeholder="Nazwa Wydarzenia"><br>
        <label for="data">Termin</label>
            <input type="datetime-local" name="data" required class="form-input" id="datetime-form"><br>
        <label for="waga">Powtarzaj co</label>
            <select name="powtarzanie" class="form-select">
                <option value="NULL">Nie powtarzaj</option>
                <option value="week">Tydzień</option>
                <option value="month">Miesiąc</option>
                <option value="year">Rok</option>
            </select><br>
        <label for="kalendarz">Kalendarz</label>
        <select name="kalendarz" id="kalendarz" class="form-select">

        </select>
        <button type="submit" class="login-form-button" id="important"> <span>Dodaj</span> </button>
    </form>
    <script>
        const kalendarzSelect = document.getElementById('kalendarz');  //Skrypt do wyboru kalendarzy dla obecnego użytkownika
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
