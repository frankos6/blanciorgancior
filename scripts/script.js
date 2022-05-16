function addEventForm() {                                                   // Otworzenie formularza do dodawania wydarzeń
    document.getElementById("options-menu").style.display = "flex";         // Pokazanie się okna 
    document.getElementById('iframe').src = "backend/dodajWydarzenie.php"   // Zmienienie iframe'a w zależności od przycisku
}

function addTaskForm(){                                                     // Otworzenie się formularza do dodawania zadań
    document.getElementById("options-menu").style.display = "flex";         // Pokazanie się okna
    document.getElementById('iframe').src = "backend/dodajZadanie.php"      // Zmienienie iframe'a w zależności od przycisku
}
  
function off() {
    document.getElementById("options-menu").style.display = "none";         // Zamykanie okna dodawania Wydarzeń/Zadań
}

function logout(){                                                          //Funkcja wylogowywania z kalendarza
    location.href = "login.php"                                             
}

let Data = (new Date()).toLocaleString();                                   // Pobranie dzisiejszej daty
Data = Data.split(",")[0];                                                  // Zamienienie formatowania daty     
console.log(Data);                                                          // Sprawdzanko czy działa
document.getElementById('date-display').innerHTML += Data;                  // Wyświetlanie dzisiejszej daty w divie

var DataId = Data.replaceAll('.', '-');                                     // Zmiana formatowania daty z XX.YY.ZZZZ na XX-YY-ZZZZ
console.log(DataId);                                                        // Sprawdzanko czy działa


// Tryb Jasny WIP // WIP // WIP // WIP // WIP // WIP
function darkMode(){
    console.log('dzialam')
    body.classList.toggle("dark-mode");
    th.classList.toggle("dark-mode");
    callcell.classList.toggle("dark-mode");
}

var body = document.getElementById('calendar-surface');
var th = document.getElementById('table-head');
var callcell = document.getElementsByClassName('calendarCell');

// Tryb Jasny WIP // WIP // WIP // WIP // WIP // WIP
