<?php 
    session_start();
    require 'login.php';
    if(!isset($_POST['Password'])){
    echo "<script> window.onload = document.getElementById('error-msg').innerHTML = ''; </script>";
    }
    $conn = new mysqli('localhost', 'root', '', 'kalendarz');


    $username = $_POST['email'];
    $password = $_POST['Password'];

    $sql = "SELECT username, password FROM users WHERE email = '$username'";
    $result = $conn->query($sql);
    
    $x = $result->fetch_row();

    if($password == $x[1]){
        $_SESSION['Imie'] = $x[0];
        header('location: index.php');
    }else{
        echo "<script> document.getElementById('error-msg').innerHTML = 'Błąd - nieprawidłowe hasło!'</script>";
    }


?>  