const slike = [
    "slike/001.jpg",
    "slike/002.jpg",
    "slike/003.jpg",
    "slike/004.jpg",
    "slike/005.jpg"
];
const naslovi = ["NASLOV 1", "NASLOV 2", "NASLOV 3", "NASLOV 4", "NASLOV 5"];
const godine = ["1951", "1944", "1970", "1955", "1983"];
const opisi = [
    "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni, esse amet dicta praesentium aliquid sunt dolor incidunt rerum quae, voluptatem magnam. Ea aspernatur molestias suscipit voluptate nisi voluptatum nesciunt vitae?",
    "Although moreover mistaken kindness me feelings do be marianne.",
    "Son over own nay with tell they cold upon are.",
    "Cordial village and settled she ability law herself. Finished why bringing but sir bachelor unpacked any thoughts.",
    "Unpleasing unsatiable particular inquietude did nor sir."
];

let index = 0;
const slika = document.getElementById("slider-slika");
const naslov = document.getElementById("naslov");
const godina = document.getElementById("godina");
const opis = document.getElementById("opis");
const tackice = document.querySelectorAll(".dot");

function prikaziSliku() {
    slika.classList.remove("visible");
    setTimeout(() => {
        slika.src = slike[index];
        naslov.textContent = naslovi[index];
        godina.textContent = godine[index];
        opis.textContent = opisi[index];

        tackice.forEach((dot, i) => {
            dot.classList.toggle("active", i === index);
        });

        slika.classList.add("visible");

        index = (index + 1) % slike.length;
    }, 100);
}

// Prvi prikaz
prikaziSliku();
setInterval(prikaziSliku, 3000);