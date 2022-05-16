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
            $q = "UPDATE wydarzenia SET nazwa = '".$_POST['nazwa']."', data = '".$_POST['data']."', powtarzanie = '".$_POST['powtarzanie']."' WHERE id = ".$_POST['id'].";";  // XDXDXDXDXD uwielbiam PHP
            $result = $conn->query($q);                                         //Query edycji zadania
            if ($result){
                echo "Pomyślnie edytowano wydarzenie.";                          // Sprawdzanie czy query się poprawnie wykonało
                echo "<script>window.parent.location.reload();</script>";       //Powrót na stronę główną w przypadku pomyślnego dodania
            }
            else {
                echo "Błąd przy edycji wydarzenia.";                         // I wyświetlanie stosownej wiadomości
            }
            die();
        }
    ?>
    <form method="post" class="form">
        <input hidden name="id" type=number value=<?php echo $_GET['id']; ?> />
        <label for="nazwa">Nazwa</label>
            <input id="nazwa" type="text" name="nazwa" required class="form-input" placeholder="Nazwa Wydarzenia"><br>
        <label for="data">Termin</label>
            <input id="data" type="datetime-local" name="data" required class="form-input" id="datetime-form"><br>
        <label for="powtarzanie">Powtarzaj co</label>
            <select id="powtarzanie" name="powtarzanie" class="form-select">
                <option value="NULL">Nie powtarzaj</option>
                <option value="week">Tydzień</option>
                <option value="month">Miesiąc</option>
                <option value="year">Rok</option>
            </select><br>
        <label for="kalendarz">Kalendarz</label>
        <select name="kalendarz" id="kalendarz" class="form-select" disabled >

        </select>
        <button type="submit" class="login-form-button" id="important"> <span>Aktualizuj</span> </button>
    </form>
        <button onclick="deleteRedirect()" class="login-form-button" id="important"> <span> Usuń</span> </button>
    <script>
        const wydarzonko = wydarzenia.filter(x => x.id === <?php echo $_GET['id']; ?>)[0];
        const kalendarzSelect = document.getElementById('kalendarz');  //Skrypt do wyboru kalendarzy dla obecnego użytkownika
        kalendarze.forEach(element => {
            var option = document.createElement("option");
                option.value = element.id;
            var text = document.createTextNode(element.nazwa);
                option.style.color = element.kolor;
            option.appendChild(text)
            kalendarzSelect.appendChild(option);
        });
        document.getElementById("nazwa").value = wydarzonko.nazwa;
        document.getElementById("data").value = wydarzonko.data.toISOString().replace(":00.000Z","") // :D
        document.getElementById("powtarzanie").value = wydarzonko.powtarzanie;
        const deleteRedirect = () => { this.parent.document.getElementById('iframe').src = '/backend/usunWydarzenie.php?id='+<?php echo $_GET['id']; ?> } // :D
    </script>
</body>
</html>
