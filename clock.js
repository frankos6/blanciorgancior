today = new Date();

opening = new Date("May 13, 2022");
msPerDay = 24 * 60 * 60 * 1000 ;
timeLeft = (opening.getTime() - today.getTime());

e_daysLeft = timeLeft / msPerDay;
daysLeft = Math.floor(e_daysLeft) + 1;

dni = daysLeft.toString();

dni = dni.substring(1);
console.log(dni);

document.getElementById("clock").innerHTML = dni + " DNI";
