<?php session_start();
    if(!isset($_SESSION['Imie'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<?php                                       // szymon-type syntax
    require("backend\connection.php")
?>
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
    <script src="scripts/script.js" defer></script>
    <script src="scripts/scripts.js" defer></script>
    <link rel="shortcut icon" type="image/x-icon" href="Images/favicon.ico" />
</head>
<body class="preload">
    <div class="content" id="calendar-surface">  
        <div class="leftside" id="leftside">
            <p id="welcome-msg">Witaj, <?php echo $_SESSION['Imie']?></p>
            <p id="date-display"></br></p>
            <div id="assignments" class="assignment-display">
            </div>
            <img src="Images/logout-icon.png" class="logout-icon" onclick="logout()" title="Wyloguj się">
            <!-- <label class="switch">
                <input type="checkbox" id="checkbox"  onclick="darkMode()">
                <span class="slider round"></span>
            </label> -->
            <div class="add-buttons">
                <button class="add-button" title="Dodaj zadanie" onclick="addTaskForm()"> Dodaj Zadanie  + </button>
                <button class="add-button" title="Dodaj wydarzenie" onclick="addEventForm()">Dodaj Wydarzenie + </button>
         </div>
        </div>
        <div class="rightside">
            <h3 class="card-header" id="monthAndYear"></h3>
            <div class="cal-top">
                <button class="btn btn-outline-primary col-sm-6" id="previous" type="button" onclick="previous()">Previous</button>
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
                    </select>
                </form>
                <button class="btn btn-outline-primary col-sm-6" id="next" type="button" onclick="next()">Next</button>
            </div>
            <table class="table" id="calendar">
                <thead id="table-head">
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
        </div>
    </div>
    <div class="options-menu" id="options-menu">
        <div class="overlay" class="w3-container w3-center w3-animate-top">
            <iframe id="iframe" src="" width="100%" height="100%"></iframe>
            <button class="login-form-button" id="important" onclick="off()" id="temp"><span>Anuluj</span></button>
        </div>
    </div>
</body>
</html>
