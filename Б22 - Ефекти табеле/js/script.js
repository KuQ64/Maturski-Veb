const podaci = [
    { rbr: 1, ime: "Pera", prezime: "Mikić", skola: "OŠ “Vuk Karadžić”", poeni: 54 },
    { rbr: 2, ime: "Mika", prezime: "Žikić", skola: "OŠ “Ivo Andrić”", poeni: 20 },
    { rbr: 3, ime: "Milan", prezime: "Marković", skola: "OŠ “Mika Antić”", poeni: 73 },
    { rbr: 4, ime: "Ivan", prezime: "Tošić", skola: "OŠ “Bubanjski heroji”", poeni: 21 },
    { rbr: 5, ime: "Jelana", prezime: "Perić", skola: "OŠ “Milan Milutinović”", poeni: 68 }, 
];

const tbody = document.querySelector("#tabela tbody");

function prikaziTabelu(podaciZaPrikaz) {
    tbody.innerHTML = "";
    podaciZaPrikaz.forEach((ucenik) => {
        const red = document.createElement("tr");
        red.innerHTML = `
            <td>${ucenik.rbr}.</td>
            <td>${ucenik.ime}</td>
            <td>${ucenik.prezime}</td>
            <td>${ucenik.skola}</td>
            <td>${ucenik.poeni}</td>
        `;
        tbody.appendChild(red);
    });
}

function resetujBoje() {
    const redovi = tbody.querySelectorAll("tr");
    redovi.forEach(red => {
        for (let i = 0; i < red.children.length; i++) {
            red.children[i].style.backgroundColor = ""; // reset
        }
    });
}

function sortiraj() {
    const sortirani = [...podaci].sort((a, b) => b.poeni - a.poeni);
    prikaziTabelu(sortirani);
}

function obojiNeparne() {
    resetujBoje();
    const redovi = tbody.querySelectorAll("tr");
    redovi.forEach((red, index) => {
        if ((index + 1) % 2 !== 0) {
            for (let i = 0; i < red.children.length; i++) {
                red.children[i].style.backgroundColor = "lightgray";
            }
        }
    });
}

function markirajPolozili() {
    resetujBoje();
    const redovi = tbody.querySelectorAll("tr");
    redovi.forEach(red => {
        const poeni = parseInt(red.children[4].textContent);
        if (poeni >= 50) {
            for (let i = 0; i < red.children.length; i++) {
                red.children[i].style.backgroundColor = "lightgreen";
            }
        }
    });
}

function markirajNisuPolozili() {
    resetujBoje();
    const redovi = tbody.querySelectorAll("tr");
    redovi.forEach(red => {
        const poeni = parseInt(red.children[4].textContent);
        if (poeni < 50) {
            for (let i = 0; i < red.children.length; i++) {
                red.children[i].style.backgroundColor = "red";
            }
        }
    });
}

function izdvojiPolozene() {
    const polozili = podaci.filter(u => u.poeni >= 50).sort((a, b) => b.poeni - a.poeni);
    prikaziTabelu(polozili);
}

prikaziTabelu(podaci);