<!DOCTYPE html>
<?php session_start() ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>『Kalendarz📆Blancior🚬Gancior🙏』</title>
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="script.js"></script>
    <link rel="icon" type="image/x-icon" href="/images/calendar-icon.png">
</head>
<body>
    <div class="leftside-menu" id="leftside">
        <div class="inline-block"> BGT <img src="Images/calendar-icon.png" class="calendar-icon"> </div>
        CALENDAR
        <hr>
        <p id ="welcome-message">Witaj, <?php echo $_SESSION['Imie']?></p>

    <img src="Images/cog-icon.png" class="options-icon" onclick="on()">
    <button onclick="logout()" class="logout-button"><span>Wyloguj</span></button>
    </div>

    <div class="options-menu" id="options-menu">
        <div class="overlay">
            <div class="navbar" id="navbar">
                <img src="Images/close-icon.svg" class="close-icon" onclick="off()">
            </div>
            <div class="options-left">
            </div>
            <div class="options-right">

            </div>
        </div>
    </div>
</body>
</html>