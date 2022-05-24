<?php
    session_start();

    require './../kalendarzbgt/login.php';                                                                                                    // Połącznie z login.php
    require './../kalendarzbgt/backend/connection.php';                                                                                       // Połącznie z bazą danych

    // error_reporting(0);                                                                                                     // Wyłączenie pokazywania błędów
    // ini_set('display_errors', 0);                                                                                           //

    if(!isset($_POST['Password'])){
    echo "<script> window.onload = document.getElementById('error-msg').innerHTML = ''; </script>";                         // Brak wiadomości błędu w wypadku braku takiego
    }

    $username = $_POST['email'];                                                                                            // Pobranie danych użytkownika
    $password = $_POST['Password'];                                                                                         // 

    $sql = "SELECT username, password FROM users WHERE email = '$username'";                                                // Mechanizm logowania
    $result = $conn->query($sql);                                                                                           //
                                                                                                                                
    $x = $result->fetch_row();                                                                                              //
                                                                                                                            
    if($password == $x[1]){                                                                                                 //
        $_SESSION['Imie'] = $x[0];                                                                                          // Ustawnianie imienia w sesji
        echo '<script> window.location.href = "/kalendarzbgt/index.php" </script>';                                                       //
    }else{                                                                                                                  //
        echo "<script> document.getElementById('error-msg').innerHTML = 'Błąd - nieprawidłowe hasło lub login!'</script>";  // Błąd logowania
    }                                                                                                                       //
?>
