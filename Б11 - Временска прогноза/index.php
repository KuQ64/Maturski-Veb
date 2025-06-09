<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Временска прогоза</title>
</head>
<body>
    <h1>Turistička agencija "Planinar"</h1>
    <ul>
        <li><a class="active" href="index.php">Početna</a></li>
        <li><a href="./php/autor.php">O autoru</a></li>
        <li><a href="./php/uputstvo.php">Uputstvo</a></li>
    </ul>
    <div class="center">
        <div class="con">
            <label for="select">Izaberite grad:</label>
            <select id="select" onchange="myFunction()">
                <option value="bg">Beograd</option>
                <option value="kv">Kraljevo</option>
                <option value="ca">Čačak</option>
                <option value="zr">Zrenjanin</option>
                <option value="va">Valjevo</option>
                <option value="vr">Vranje</option>
                <option value="sb">Subotica</option>
                <option value="bo">Bor</option>
                <option value="ni">Niš</option>
                <option value="ns">Novi Sad</option>
            </select>
        </div>
        <iframe class="center" id='frame1' src='https://naslovi.net/vremenska-prognoza/beograd'></iframe>
    </div>

    <footer>&copy Turistička agencija "Planinar"</footer>

    <script src="./js/custom.js"></script>
</body>
</html>