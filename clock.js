today = new Date();

opening = new Date("April 20, 2022");
msPerDay = 24 * 60 * 60 * 1000 ;
timeLeft = (opening.getTime() - today.getTime());

e_daysLeft = timeLeft / msPerDay;
daysLeft = Math.floor(e_daysLeft);

document.getElementById("clock").innerHTML = daysLeft + " DNI";