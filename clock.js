const today = new Date();

const opening = new Date("May 13, 2022");
const msPerDay = 24 * 60 * 60 * 1000 ;
const timeLeft = (opening.getTime() - today.getTime());

const e_daysLeft = timeLeft / msPerDay;
const daysLeft = Math.floor(e_daysLeft) + 1;

let dni = daysLeft.toString();

dni = dni.substring(1);
console.log(dni);

document.getElementById("clock").innerHTML = dni + " DNI";
