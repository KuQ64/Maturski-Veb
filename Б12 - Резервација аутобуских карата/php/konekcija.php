<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "autobuske_rezervacije";

    $conn = new mysqli($servername, $username, $password, $database);
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }

    // $sql = "CREATE TABLE sedista (
    //         id INT AUTO_INCREMENT PRIMARY KEY,
    //         brojSedista INT NOT NULL,
    //         rezervacija BOOLEAN NOT NULL
    //     );";

    // if ($conn->query($sql) === TRUE) {
    // echo "Uspesna konekcija";
    // } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    // for ($i = 2; $i <= 53; $i++) 
    // {
    //     $sql = "INSERT INTO sedista (brojSedista, rezervacija) VALUES ($i, 0)";
    //     if ($conn->query($sql) !== TRUE) {
    //         echo "Greška pri unosu sedišta broj $i: " . $conn->error . "<br>";
    //     }
    // }
    // echo "Sva sedišta su uspešno uneta.";

    // $conn->close();
?>