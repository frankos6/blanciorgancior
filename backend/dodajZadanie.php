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
    ?>
    <form action="." method="post">
        <label for="nazwa">Nazwa</label>
        <input type="text" name="nazwa" required><br>
        <label for="data">Termin</label>
        <input type="date" name="data" required><br>
        <label for="opis">Opis</label>
        <textarea name="opis"></textarea><br>
        <label for="waga">Waga</label>
        <select name="wagi">
            <option value="normal">Normalne</option>
            <option value="high">Ważne</option>
            <option value="veryhigh">Bardzo ważne</option>
        </select><br>
        <label for="kalendarz">Kalendarz</label>
        <select name="kalendarz" id="kalendarz">

        </select>
    </form>
    <script>
        const kalendarzSelect = document.getElementById('kalendarz');
        kalendarze.forEach(element => {
            var option = document.createElement("option");
            option.attributes.value = element.id;
            var text = document.createTextNode(element.nazwa);
            option.style.color = element.kolor;
            option.appendChild(text)
            kalendarzSelect.appendChild(option);
        });
    </script>
</body>
</html>