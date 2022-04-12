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
    <title>『Kalendarz📆Blancior🚬Gancior🙏』</title>
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="Scripts/script.js"></script>
    <script defer src="Scripts/scripts.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="Images/favicon.ico" />
</head>
<body>
    <div class="leftside-menu" id="leftside">
        <img src="Images/calendars-icon.png" class="menu-icons">
        <img src="Images/dashboard-icon.png" class="menu-icons">
        <img src="Images/cog-icon.png" class="options-icon" onclick="on()">
        <img src="Images/logout-icon.png" class="logout-icon" onclick="logout()">
    </div>
    <div class="rightside">
        <h3 class="card-header" id="monthAndYear"></h3>
        <table class="table table-bordered table-responsive-sm" id="calendar">
            <thead>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
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
            <label class="lead mr-2 ml-2" for="month">Jump To: </label>
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
            <option value=1990>1990</option>
            <option value=1991>1991</option>
            <option value=1992>1992</option>
            <option value=1993>1993</option>
            <option value=1994>1994</option>
            <option value=1995>1995</option>
            <option value=1996>1996</option>
            <option value=1997>1997</option>
            <option value=1998>1998</option>
            <option value=1999>1999</option>
            <option value=2000>2000</option>
            <option value=2001>2001</option>
            <option value=2002>2002</option>
            <option value=2003>2003</option>
            <option value=2004>2004</option>
            <option value=2005>2005</option>
            <option value=2006>2006</option>
            <option value=2007>2007</option>
            <option value=2008>2008</option>
            <option value=2009>2009</option>
            <option value=2010>2010</option>
            <option value=2011>2011</option>
            <option value=2012>2012</option>
            <option value=2013>2013</option>
            <option value=2014>2014</option>
            <option value=2015>2015</option>
            <option value=2016>2016</option>
            <option value=2017>2017</option>
            <option value=2018>2018</option>
            <option value=2019>2019</option>
            <option value=2020>2020</option>
            <option value=2021>2021</option>
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
