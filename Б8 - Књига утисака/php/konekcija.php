<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "knjiga_utisaka";

    $conn = new mysqli($servername, $username, $password, $database);
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }

    // $sql = "CREATE TABLE Utisak (
    //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     email VARCHAR(30) NOT NULL,
    //     ime VARCHAR(30) NOT NULL,
    //     komentar VARCHAR(100) NOT NULL,
    //     datum VARCHAR(50) NOT NULL
    //     )";

    // if ($conn->query($sql) === TRUE) {
    // echo "Uspesna konekcija";
    // } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    // $conn->close();
?>