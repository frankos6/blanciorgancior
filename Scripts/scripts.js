today = new Date();
currentMonth = today.getMonth();
currentYear = today.getFullYear();
selectYear = document.getElementById("year");
selectMonth = document.getElementById("month");

months = [];
for (let i = 0; i < 12; i++) {
    date = new Date(2022,i,10);
    months[i] = capitalize(date.toLocaleString('default', { month: 'long' }));
}

monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);
updateButtons();

function capitalize(string){
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function updateButtons(){
    if (currentMonth === 0) {
        document.getElementById('previous').innerText = "< "+months[11];
    }
    else 
    {document.getElementById('previous').innerText = "< "+months[currentMonth-1];}
    if (currentMonth === 11) {
        document.getElementById('next').innerText = months[0]+" >";
    }
    else
    {document.getElementById('next').innerText = months[currentMonth+1]+" >";}
    if (currentMonth===11 && currentYear === 2030){
        document.getElementById('next').style.opacity= "0%";
        document.getElementById('next').disabled = true;
    }
    else {
        document.getElementById('next').style.opacity= "100%";
        document.getElementById('next').disabled = false;
    }
    if (currentMonth===0 && currentYear === 1990){
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

function showCalendar(month, year) {

    let firstDay = (new Date(year, month)).getDay();

    tbl = document.getElementById("calendar-body"); // body of the calendar

    // clearing all previous cells
    tbl.innerHTML = "";

    // filing data about month and in the page via DOM.
    monthAndYear.innerHTML = months[month] + " " + year;
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
                cell = document.createElement("td");
                cellText = document.createTextNode(daysInMonth(month-1,year)-firstDay+j+1);
                cell.style.color = "lightgray";
                cell.appendChild(cellText);
                row.appendChild(cell);
            }
            else if (date > daysInMonth(month, year)) {
                cell = document.createElement("td");
                cellText = document.createTextNode(xd);
                cell.id = `${xd++}-${month-1}-${year}`;
                cell.style.color = "lightgray";
                cell.appendChild(cellText);
                row.appendChild(cell);
            }
            else {
                cell = document.createElement("td");
                cellText = document.createTextNode(date);
                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.classList.add("bg-info");
                } // color today's date
                cell.id = `${date}-${month+1}-${year}`
                cell.appendChild(cellText);
                row.appendChild(cell);
                date++;
            }


        }

        tbl.appendChild(row); // appending each row into calendar body.
    }

}


// check how many days in a month code from https://dzone.com/articles/determining-number-days-month
function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}
