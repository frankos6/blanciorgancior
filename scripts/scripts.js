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
                cell.id = `${cellText.textContent}-${month==0 ? 12 : month}-${month==0 ? year-1 : year}`
                cell.attributes.day = j;
                cell.zadania = [];
                cell.wydarzenia = [];
                cell.appendChild(cellText);
                cell.addEventListener('click',displayDayInfo);
                row.appendChild(cell);
            }
            else if (date > daysInMonth(month, year)) {
                cell = document.createElement("td");
                cellText = document.createTextNode(xd);
                cell.id = `${xd++}-${month+2}-${year}`;
                cell.style.color = "lightgray";
                cell.attributes.day = j;
                cell.zadania = [];
                cell.wydarzenia = [];
                cell.appendChild(cellText);
                cell.addEventListener('click',displayDayInfo)
                row.appendChild(cell);
            }
            else {
                cell = document.createElement("td");
                cellText = document.createTextNode(date);
                cell.attributes.day = j;
                cell.id = `${date}-${month+1}-${year}`;
                cell.zadania = [];
                cell.wydarzenia = [];
                cell.appendChild(cellText);
                cell.addEventListener('click',displayDayInfo)
                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.classList.add("bg-info");
                    cell.click();
                } // color today's date
                cell.classList.add("calendarCell");
                row.appendChild(cell);
                date++;
            }
            

        }

        tbl.appendChild(row); // appending each row into calendar body.
    }

    color = "yellow";

    wydarzenia.forEach(element => {
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
        if (element.data.getMonth() === currentMonth){
            var x = document.getElementById(`${element.data.getDate()}-${currentMonth+1}-${currentYear}`);
            if (x!=null){
                x.style.border = "1px solid " + color;
                x.zadania.push(element)
            }
            
        }
    });

}


// check how many days in a month code from https://dzone.com/articles/determining-number-days-month
function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}

function displayDayInfo(event) {
    document.getElementById("date-display").innerHTML = parseDate(event.currentTarget.id).toLocaleDateString();
    var targetDiv = document.getElementById('assignments');
    targetDiv.innerHTML = "";
    if (event.currentTarget.zadania.length > 0){
        var ul = document.createElement('ul');
        event.currentTarget.zadania.forEach(element => {
            var li = document.createElement('li');
            li.innerHTML = element.nazwa;
            ul.appendChild(li);
        });
        targetDiv.appendChild(ul);
    }
    else {
        var div1 = document.createElement("div");
        div1.innerHTML = "Brak zadań tego dnia.";
        targetDiv.appendChild(div1);
    }
    var hr = document.createElement("hr");
    targetDiv.appendChild(hr);
    if (event.currentTarget.wydarzenia.length > 0){
        var ul = document.createElement('ul');
        event.currentTarget.wydarzenia.forEach(element => {
            var li = document.createElement('li');
            li.innerHTML = element.nazwa + " | " + element.data.toLocaleTimeString("pl",{hour: '2-digit', minute:'2-digit'});
            ul.appendChild(li);
        });
        targetDiv.appendChild(ul);
    }
    else {
        var div2 = document.createElement("div");
        div2.innerHTML = "Brak wydarzeń tego dnia.";
        targetDiv.appendChild(div2);
    }
}