<?php
    require 'register.php';
    error_reporting(0);
    ini_set('display_errors', 0);

    echo "<script> window.onload = document.getElementById('error-msg').innerHTML = ''; </script>";

    $conn = new mysqli('localhost', 'root', '', 'kalendarz');

    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $Pass = $_POST['Password'];
    $RePass = $_POST['RePassword'];

    $result = $conn->query("SELECT id FROM users WHERE email = '$email'");

    if(mysqli_num_rows($result) == 0){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<script> document.getElementById('error-msg').innerHTML = 'Niepoprawny adres e-mail!'</script>";
        } else{
            if ($Pass == $RePass){
                $conn->query("INSERT INTO users VALUES (null, '$name', '$email', '$Pass')");   
                header('Location: login.php');
            } else{
                echo "<script> document.getElementById('error-msg').innerHTML = 'Hasła się nie zgadzają!'</script>";
            }
        }
    }else{
        echo "<script> document.getElementById('error-msg').innerHTML = 'Konto o takim adresie e-mail już istnieje!'</script>";
    }
?>
