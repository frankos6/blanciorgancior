<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/kalendarzbgt/styles/style.css">
    <link rel="icon" href="/kalendarzbgt/Images/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="/kalendarzbgt/scripts/script.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="/kalendarzbgt/Images/favicon.ico" />
</head>
<body>
<div class="center-box">
        <div class="logo-box"> 
            <div class="inline-block"> BGT <img src="/kalendarzbgt/Images/calendar-icon.png" class="calendar-icon"> </div>
            CALENDAR
            <hr class="cat"> 
        </div>
        <div class="login-box">
            <form action="/kalendarzbgt/logowanie.php" class="login-form" method="POST">
            <p class="login-header">LOGOWANIE</p>
                <p class="login-form-text">Adres e-mail:</p>
                <input type="text" name="email" class="login-form-input" required placeholder="Adres e-mail">
                <p class="login-form-text">Hasło:</p>
                <input type="password" name="Password" class="login-form-input" required placeholder="Hasło">
                <button type="submit" class="login-form-button"><span>Zaloguj</span></button>
            </form>
                <p id="error-msg"></p>
                <p class="register-text">Nie masz jeszcze konta?</p>
                <p class="register-link"><a href="/kalendarzbgt/register.php">Zarejestruj się!</a></p>
        </div>
</div>
</body>
</html>
