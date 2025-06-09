<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Početna</title>
</head>
<body>
    <?php
        include './php/konekcija.php';
        
    ?>
    <h1 class="header">Rezervacija autobuskih karata</h1>
    <nav class="navBar">
        <ul>
            <li><a href="index.php">Početna</a></li>
            <li><a href="./html/autor.html">O autoru</a></li>
            <li><a href="./html/uputstvo.html">Uputstvo</a></li>
        </ul>
    </nav>
    <h2>Prikaz sedišta autobusa:</h2>

    <form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="container" id="bus-seats"></div>

        <div class="elementiForme">
            <label id="prvaLabela">Broj sedišta:</label>
            <input type="text" id="seat-number" name="seat_number" readonly>
            <br><br>

            <label>Ime i prezime:</label>
            <input type="text" name="fullname" required>
            <br><br>

            <label>E-mail:</label>
            <input type="email" name="email" required>
            <br><br>

            <input type="submit" name="submit" value="Pošalji">
            <br>
        </div>
    </form>

    <?php
        if(isset($_POST["submit"]))
        {
            $br = $_POST["seat_number"];
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];

            // Provera da li je broj sedišta validan broj
            if (!is_numeric($br)) 
            {
                echo "Neispravan unos broja sedišta!";
                exit;
            }

            $sql = 'SELECT * FROM sedista WHERE brojSedista = '.intval($br);
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                if($row["rezervacija"] == 0)
                {
                    $update = "UPDATE sedista SET rezervacija = 1 WHERE brojSedista = " . intval($br);
                    if($conn->query($update) === TRUE)
                    {
                        echo "<script>location.reload();</script>";
                        exit;
                    }
                    else
                    {
                        echo "Greška pri rezervaciji: " . $conn->error;
                    }
                }
                else
                {
                    echo "Ovo sedište je već rezervisano!";
                }
            }
            else
            {
                echo "Sedište sa brojem $br ne postoji.";
            }
        }
    ?>
    
    <footer>
        © Autobuska stanica
    </footer>


    <script>
        const occupiedSeats = 
        <?php
            $rezervisana = [];
            $result = $conn->query("SELECT brojSedista FROM sedista WHERE rezervacija = 1");
            while($row = $result->fetch_assoc()) {
                $rezervisana[] = $row['brojSedista'];
            }
            echo json_encode($rezervisana);
        ?>.map(Number);;

        const container = document.getElementById("bus-seats");
        let seatCounter = 2;
        for (let col = 0; col < 5; col++) 
        {
            if (col === 2) 
            {
                // prazna kolona za prolaz
                const emptyCol = document.createElement("div");
                emptyCol.className = "column";
                for (let i = 0; i < 13; i++) 
                {
                    const space = document.createElement("div");
                    space.style.height = "40px";
                    emptyCol.appendChild(space);
                }
                container.appendChild(emptyCol);
                continue;
            }

            const column = document.createElement("div");
            column.className = "column";

            for (let row = 0; row < 13; row++) 
            {
                const seat = document.createElement("div");
                seat.className = "seat";
                seat.textContent = seatCounter;

                if (occupiedSeats.includes(seatCounter)) 
                {
                    seat.classList.add("occupied");
                } 
                else 
                {
                    seat.classList.add("available");
                    seat.addEventListener("click", function () {
                    document.getElementById("seat-number").value = seat.textContent;
                    });
                }

                column.appendChild(seat);
                seatCounter++;
            }
            container.appendChild(column);
        }
    </script>
</body>
</html>