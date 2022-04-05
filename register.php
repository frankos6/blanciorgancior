<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="stylesheet" href="Styles/login-bg.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="script.js"></script>
    <link rel="icon" type="image/x-icon" href="/images/calendar-icon.png">
</head>
<body>
<div class="center-box">
    <!--<div class="logo-box"> 
         <div class="inline-block"> BGT <img src="Images/calendar-icon.png" class="calendar-icon"> </div>
        CALENDAR
        <hr> 
    </div>-->
        <div class="login-box">
            <form action="rejestracja.php" class="login-form" method="POST">
            <p class="register-header">REJESTRACJA</p>
                <p class="login-form-text">Imię:</p>
                <input type="text" name="Name" class="login-form-input" required>
                <p class="login-form-text">Adres e-mail:</p>
                <input type="text" name="Email" class="login-form-input" required>
                <p class="login-form-text">Hasło:</p>
                <input type="password" name="Password" class="login-form-input" required>
                <p class="login-form-text">Powtórz hasło:</p>
                <input type="password" name="RePassword" class="login-form-input" required>
                <button type="submit" class="login-form-button"><span>Zarejestruj</span></button>
            </form>
                <p id="error-msg"></p>
                <p class="register-text">Masz już konto??</p>
                <p class="register-link"><a href="login.php">Zaloguj się!</a></p>
        </div>
</div>
</body>
</html>