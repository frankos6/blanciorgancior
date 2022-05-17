const today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();
const selectYear = document.getElementById("year");
const selectMonth = document.getElementById("month");

let months = [];
for (let i = 0; i < 12; i++) {
    let date = new Date(2022,i,10);
    months[i] = capitalize(date.toLocaleString('default', { month: 'long' }));
}

showCalendar(currentMonth, currentYear);
updateButtons();

function capitalize(string){
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function updateButtons(){
    if (currentMonth === 0) {
        document.getElementById('previous').innerText = "<< ";
    }
    else 
    {document.getElementById('previous').innerText = "<< ";}
    if (currentMonth === 11) {
        document.getElementById('next').innerText = " >>";
    }
    else
    {document.getElementById('next').innerText = " >>";}
    if (currentMonth===11 && currentYear === 2030){
        document.getElementById('next').style.opacity= "0%";
        document.getElementById('next').disabled = true;
    }
    else {
        document.getElementById('next').style.opacity= "100%";
        document.getElementById('next').disabled = false;
    }
    if (currentMonth===0 && currentYear === 2022){
        document.getElementById('previous').style.opacity= "0%";
        document.getElementById('previous').disabled = true;
    }
    else {
        document.getElementById('previous').style.opacity= "100%";
        document.getElementById('previous').disabled = false;
    }
}

function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
    updateButtons();
    
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
    updateButtons();
}

function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
    updateButtons();
}

function parseDate(input, format) {
    format = format || 'dd-mm-yyyy';
    var parts = input.match(/(\d+)/g), 
        i = 0, fmt = {};
    format.replace(/(yyyy|dd|mm)/g, part => { fmt[part] = i++; });
    try {
        return new Date(parts[fmt['yyyy']], parts[fmt['mm']]-1, parts[fmt['dd']]);
    }
    catch (e) {
        if (e.name === "TypeError"){
            console.error("Invalid date/format");
            return null;
        }
        else throw e;
    }
  }

function showCalendar(month, year) {

    let firstDay = (new Date(year, month)).getDay()!=0 ? (new Date(year, month)).getDay() : 7;

    const tbl = document.getElementById("calendar-body"); // body of the calendar

    // clearing all previous cells
    tbl.innerHTML = "";

    selectYear.value = year;
    selectMonth.value = month;

    // creating all cells
    let date = 1;
    let xd = 1;
    for (let i = 0; i < 6; i++) {
        // creates a table row
        let row = document.createElement("tr");

        //creating individual cells, filing them up with data.
        for (let j = 1; j < 8; j++) {
            if (i === 0 && j < firstDay) {
                const cell = document.createElement("td");
                const cellText = document.createTextNode(daysInMonth(month-1,year)-firstDay+j+1);
                cell.style.color = "lightgray";
                cell.id = `${cellText.textContent}-${month==0 ? 12 : month}-${month==0 ? year-1 : year}`
                cell.attributes.day = j;
                cell.zadania = [];
                cell.wydarzenia = [];
                cell.appendChild(cellText);
                cell.addEventListener('click',event=>{
                    const id = event.currentTarget.id;
                    previous();
                    document.getElementById(id).click();
                });
                row.appendChild(cell);
            }
            else if (date > daysInMonth(month, year)) {
                const cell = document.createElement("td");
                const cellText = document.createTextNode(xd);
                cell.id = `${xd++}-${month+2}-${year}`;
                cell.style.color = "lightgray";
                cell.attributes.day = j;
                cell.zadania = [];
                cell.wydarzenia = [];
                cell.appendChild(cellText);
                cell.addEventListener('click',event=>{
                    const id = event.currentTarget.id;
                    next();
                    document.getElementById(id).click();
                });
                row.appendChild(cell);
            }
            else {
                const cell = document.createElement("td");
                const cellText = document.createTextNode(date);
                cell.attributes.day = j;
                cell.id = `${date}-${month+1}-${year}`;
                cell.zadania = [];
                cell.wydarzenia = [];
                cell.appendChild(cellText);
                cell.addEventListener('click',displayDayInfo)
                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.classList.add("bg-info");
                    window.onload = () => {cell.click();}
                } // color today's date
                cell.classList.add("calendarCell");
                row.appendChild(cell);
                date++;
            }
            

        }

        tbl.appendChild(row); // appending each row into calendar body.
    }

    let color = "yellow"; //default

    wydarzenia.forEach(element => {
        let temp = kalendarze.find(x => x.id === element.kalendarz_id); // color = kolor kalendarza
        if (temp === undefined){
            color = "yellow"; //default
        }
        else {
            color = temp.kolor;
        }
        if (element.kalendarz_id != selectedCalendar) return;
        if (element.data.getMonth() === currentMonth && (element.data.getFullYear() === currentYear||element.powtarzanie === "year")){
            var x = document.getElementById(`${element.data.getDate()}-${currentMonth+1}-${currentYear}`);
            if (x!=null){
                x.style.color = color; 
                x.wydarzenia.push(element);
            }
            
        }
        if (element.powtarzanie === "month" && element.data.valueOf()<=(new Date(currentYear,currentMonth,1)).valueOf()){
            var x = document.getElementById(`${element.data.getDate()}-${currentMonth+1}-${currentYear}`);
            if (x!=null){
                x.style.color = color;
                x.wydarzenia.push(element);
            }
        }
        if (element.powtarzanie === "week" /* && element.data.valueOf()<=(new Date(currentYear,currentMonth,1)).valueOf()*/){
            for (var tr of document.getElementById("calendar-body").children){
                for (var td of tr.children){
                    if (parseDate(td.id).getDay()==element.data.getDay()&&parseDate(td.id).valueOf()>=element.data.valueOf()){
                        td.style.color = color;
                        td.wydarzenia.push(element);
                    }
                }
            }
        }
    });
    zadania.forEach(element => {
        let temp = kalendarze.find(x => x.id === element.kalendarz_id);
        if (temp === undefined){
            color = "yellow"; //default
        }
        else {
            color = temp.kolor;
        }
        if (element.kalendarz_id != selectedCalendar) return;
        if (element.data.getMonth() === currentMonth){
            var x = document.getElementById(`${element.data.getDate()}-${currentMonth+1}-${currentYear}`);
            if (x!=null){
                x.style.border = "1px solid " + color;
                x.zadania.push(element)
            }
            
        }
    });

}


function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}

function displayDayInfo(event) {
    document.getElementById("date-display").innerHTML = parseDate(event.currentTarget.id).toLocaleDateString();
    const targetDiv = document.getElementById('assignments');
    targetDiv.innerHTML = "";
    if (event.currentTarget.zadania.length > 0){                                                                // lista zadań
        const ul = document.createElement('ul');
        event.currentTarget.zadania.forEach(element => {
            const li = document.createElement('li');
            li.innerHTML = element.nazwa;
            li.onclick = () =>{                                                              // Otworzenie się formularza do edycji zadań
                    document.getElementById("options-menu").style.display = "flex";          // Pokazanie się okna
                    document.getElementById('iframe').src = "backend/edytujZadanie.php?id="+element.id;     // Zmienienie iframe'a w zależności od przycisku
            }
            ul.appendChild(li);
        });
        targetDiv.appendChild(ul);
    }
    else {
        const div1 = document.createElement("div");
        div1.innerHTML = "Brak zadań tego dnia.";
        targetDiv.appendChild(div1);
    }
    const hr = document.createElement("hr");
    targetDiv.appendChild(hr);
    if (event.currentTarget.wydarzenia.length > 0){                                                             // lista wydarzeń
        const ul = document.createElement('ul');
        event.currentTarget.wydarzenia.forEach(element => {
            const li = document.createElement('li');
            li.innerHTML = element.nazwa + " | " + element.data.toLocaleTimeString("pl",{hour: '2-digit', minute:'2-digit'});
            li.onclick = () =>{                                                              // Otworzenie się formularza do edycji zadań
                    document.getElementById("options-menu").style.display = "flex";          // Pokazanie się okna
                    document.getElementById('iframe').src = "backend/edytujWydarzenie.php?id="+element.id;     // Zmienienie iframe'a w zależności od przycisku
            }
            ul.appendChild(li);
        });
        targetDiv.appendChild(ul);
    }
    else {
        const div2 = document.createElement("div");
        div2.innerHTML = "Brak wydarzeń tego dnia.";
        targetDiv.appendChild(div2);
    }
    clearClickedClass();
    event.currentTarget.classList.add("calendarCellClick");
}

function clearClickedClass() {
    for (var tr of document.getElementById("calendar-body").children){ // każdy wiersz (tydzień)
        for (var td of tr.children){                                   // każdy dzień
            td.classList.remove("calendarCellClick");
        }
    }
}
