<?php
    require 'register.php';                                                                                                 // Połączenie z register.php
    require 'backend/connection.php';                                                                                       // Połączenie z bazą danych

    error_reporting(0);                                                                                                     // Wyłącznie pokazywanie błędów
    ini_set('display_errors', 0);                                                                                           //

    echo "<script> window.onload = document.getElementById('error-msg').innerHTML = ''; </script>";                         // Brak wiadomości błędu w wypadku braku takiego

    $name = $_POST['Name'];                                                                                                 // Pobranie danych użytkownika
    $email = $_POST['Email'];                                                                                               // 
    $Pass = $_POST['Password'];                                                                                             // 
    $RePass = $_POST['RePassword'];                                                                                         // 

    $result = $conn->query("SELECT id FROM users WHERE email = '$email'");                                                  // Mechanizm rejestracji

    if(mysqli_num_rows($result) == 0){                                                                                      //
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){                                                                     //
            echo "<script> document.getElementById('error-msg').innerHTML = 'Niepoprawny adres e-mail!'</script>";          //
        } else{                                                                                                             //
            if ($Pass == $RePass){                                                                                          //  
                $conn->query("INSERT INTO users VALUES (null, '$name', '$email', '$Pass')");                                //
                echo '<script> window.location.href = "login.php" </script>';                                               // Przejście na login.php w przypadku pomyślnej rejestracji
            } else{                                                                                                         // 
                echo "<script> document.getElementById('error-msg').innerHTML = 'Hasła się nie zgadzają!'</script>";        // Błąd o niepoprawnych hasłach
            }                                                                                                               //
        }                                                                                                                   //
    }else{                                                                                                                  //
    echo "<script> document.getElementById('error-msg').innerHTML = 'Konto o takim adresie e-mail już istnieje!'</script>"; // Błąd o istnieniu konta o takim e-mailu
    }
?>
