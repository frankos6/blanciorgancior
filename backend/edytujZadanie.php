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
    <title>Nie powinno cię tu być</title>
    <style> body{ background-color: #141414;
                  background-image: none;
                  display: flex;
                  justify-content: center;
                  flex-direction: column;
                  }</style>
</head>
<body>
    <?php
        require('connection.php');                                              // Połączenie z bazą danych
        if (isset($_POST['nazwa'])) {
            $q = "UPDATE zadania SET nazwa = '".$_POST['nazwa']."', data = '".$_POST['data']."', waga = '".$_POST['waga']."' WHERE id = ".$_POST['id'].";";  // XDXDXDXDXD uwielbiam PHP
            $result = $conn->query($q);                                         //Query edycji zadania
            if ($result){
                echo "Pomyślnie edytowano zadanie.";                          // Sprawdzanie czy query się poprawnie wykonało
                echo "<script>window.parent.location.reload();</script>";       //Powrót na stronę główną w przypadku pomyślnego dodania
            }
            else {
                echo "Błąd przy edycji zadania.";                         // I wyświetlanie stosownej wiadomości
            }
            die();
        }
    ?>
    <form method="post" class="form">
        <label for="nazwa">Nazwa</label>
            <input type="text" id="nazwa" name="nazwa" class="form-input" placeholder="Nazwa zadania" required><br>
        <label for="data">Termin</label>
            <input type="date" id="data" name="data" class="form-input" required><br>
        <label for="waga">Waga</label>
            <select id="wagi" name="waga" class="form-input" required>
                <option value="normal">Normalne</option>
                <option value="high">Ważne</option>
                <option value="veryhigh">Bardzo ważne</option>
            </select><br>
        <label for="kalendarz">Kalendarz</label>
            <select name="kalendarz" class="form-input" id="kalendarz" required disabled>
            </select>
        <button type="submit" class="login-form-button" id="important"> <span>Aktualizuj</span> </button>
    </form>
    <button onclick="deleteRedirect()" class="login-form-button" id="important"> <span> Usuń</span> </button>
    <script>
        const zadanko = zadania.filter(x => x.id === <?php echo $_GET['id']; ?>)[0];
        const kalendarzSelect = document.getElementById('kalendarz');   //Skrypt do wyboru kalendarzy dla obecnego użytkownika
        kalendarze.forEach(element => {
            var option = document.createElement("option");
                option.value = element.id;
            var text = document.createTextNode(element.nazwa);
                option.style.color = element.kolor;
            option.appendChild(text)
                kalendarzSelect.appendChild(option);
        });
        document.getElementById("nazwa").value = zadanko.nazwa;
        document.getElementById("data").value = zadanko.data.toISOString().match(/(.*)T/)[1] // :D
        document.getElementById("wagi").value = zadanko.waga;
        const deleteRedirect = () => { this.parent.document.getElementById('iframe').src = '/backend/usunZadanie.php?id='+<?php echo $_GET['id']; ?> } // :D
    </script>
</body>
</html>