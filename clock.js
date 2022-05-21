const today = new Date();

const opening = new Date("May 13, 2022");
const msPerDay = 24 * 60 * 60 * 1000 ;
const timeLeft = (opening.getTime() - today.getTime());

const e_daysLeft = timeLeft / msPerDay;
const daysLeft = Math.abs(Math.floor(e_daysLeft) + 1);

const dni = daysLeft.toString();
console.log(dni);

document.getElementById("clock").innerHTML = dni + " DNI";
