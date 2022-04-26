function on() {
    document.getElementById("options-menu").style.display = "flex";
}
  
function off() {
    document.getElementById("options-menu").style.display = "none";
}

// Funkcje do zmiany koloru 

function colorChange(color) {
    document.getElementById("leftside").style.backgroundColor = color;
    document.getElementById("navbar").style.backgroundColor = color;
}

function logout(){
    location.href = "login.php"
}
