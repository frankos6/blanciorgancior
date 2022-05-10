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
        require('connection.php');
        if (isset($_POST['nazwa'])){
            $q = "INSERT INTO zadania(`nazwa`,`data`,`waga`,`kalendarz_id`) VALUES ('".$_POST['nazwa']."','".$_POST['data']."','".$_POST['wagi']."','".$_POST['kalendarz']."')";
            $result = $conn->query($q);
            if ($result){
                echo "Pomyślnie dodano zadanie.";
            }
            else {
                echo "Błąd przy dodawaniu zadania.";
            }
            die();
        }
    ?>
    <form method="post">
        <label for="nazwa">Nazwa</label>
        <input type="text" name="nazwa" required><br>
        <label for="data">Termin</label>
        <input type="date" name="data" required><br>
        <label for="waga">Waga</label>
        <select name="wagi" required>
            <option value="normal">Normalne</option>
            <option value="high">Ważne</option>
            <option value="veryhigh">Bardzo ważne</option>
        </select><br>
        <label for="kalendarz">Kalendarz</label>
        <select name="kalendarz" id="kalendarz" required>

        </select>
    </form>
    <script>
        const kalendarzSelect = document.getElementById('kalendarz');
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