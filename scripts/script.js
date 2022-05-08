function on() {
    document.getElementById("options-menu").style.display = "flex";
}
  
function off() {
    document.getElementById("options-menu").style.display = "none";
}

function logout(){
    location.href = "login.php"
}


// Wyświetlanie dzisiejszej daty// 
let Data = (new Date()).toLocaleString();
Data = Data.split(",")[0];
console.log(Data);
document.getElementById('date-display').innerHTML += Data;

var DataId = Data.replaceAll('.', '-');
console.log(DataId);

function darkMode(){
    console.log('dzialam')
    body.classList.toggle("dark-mode");
    th.classList.toggle("dark-mode");
    callcell.classList.toggle("dark-mode");
}

var body = document.getElementById('calendar-surface');
var th = document.getElementById('table-head');
var callcell = document.getElementsByClassName('calendarCell');
