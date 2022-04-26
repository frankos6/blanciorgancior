<?php session_start();
    if(!isset($_SESSION['Imie'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz Blancior Gigancior!</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" href="Images/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="scripts/script.js"></script>
    <script src="scripts/scripts.js" defer></script>
    <link rel="shortcut icon" type="image/x-icon" href="Images/favicon.ico" />
</head>
<body>
    <div class="navbar-menu">
        <div class="foo">
            <img src="Images/calendar-icon.png" class="menu-icons"> 
            <div class="navbar-text"> BGT CALENDAR </div>
        </div>
        <div>
        <img src="Images/plus-icon.png" class="options-icon" onclick="on()" title="Dodaj wydarzenie">
        <img src="Images/logout-icon.png" class="menu-icons" onclick="logout()" title="Wyloguj się">
        </div>
    </div>
    <div class="content">
        <div class="leftside" id="leftside">
            <p id="welcome-msg">Witaj, <?php echo $_SESSION['Imie']?></p>
        </div>
        <div class="rightside">
            <h3 class="card-header" id="monthAndYear"></h3>
            <form class="form-inline">
                <label class="lead mr-2 ml-2" for="month"></label>
                <select class="form-control col-sm-4" name="month" id="month" onchange="jump()">
                    <option value=0>Styczeń</option>
                    <option value=1>Luty</option>
                    <option value=2>Marzec</option>
                    <option value=3>Kwiecień</option>
                    <option value=4>Maj</option>
                    <option value=5>Czerwiec</option>
                    <option value=6>Lipiec</option>
                    <option value=7>Sierpień</option>
                    <option value=8>Wrzesień</option>
                    <option value=9>Październik</option>
                    <option value=10>Listopad</option>
                    <option value=11>Grudzień</option>
                </select>
                <label for="year"></label><select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
                <option value=2022>2022</option>
                <option value=2023>2023</option>
                <option value=2024>2024</option>
                <option value=2025>2025</option>
                <option value=2026>2026</option>
                <option value=2027>2027</option>
                <option value=2028>2028</option>
                <option value=2029>2029</option>
                <option value=2030>2030</option>
            </select></form>
            <table class="table table-bordered table-responsive-sm" id="calendar">
                <thead>
                <tr>
                    <th>Poniedziałek</th>
                    <th>Wtorek</th>
                    <th>Środa</th>
                    <th>Czwartek</th>
                    <th>Piątek</th>
                    <th>Sobota</th>
                    <th>Niedziela</th>
                </tr>
                </thead>

                <tbody id="calendar-body">

                </tbody>
            </table>
            <div class="form-inline">

                <button class="btn btn-outline-primary col-sm-6" id="previous" onclick="previous()">Previous</button>

                <button class="btn btn-outline-primary col-sm-6" id="next" onclick="next()">Next</button>
            </div>
            <br/>
            <form class="form-inline">
        </div>
    </div>
    <div class="options-menu" id="options-menu">
        <div class="overlay">
            <iframe src="backend/dodajWydarzenie.php" width="100%" height="100%"></iframe>
            <button class="login-form-button" onclick="off()" id="temp"><span>Anuluj</span></button>
        </div>
    </div>
</body>
</html>
