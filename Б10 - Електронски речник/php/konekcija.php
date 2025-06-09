<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "elektronski_recnik";

    $conn = new mysqli($servername, $username, $password, $database);
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }

    // $sql = "CREATE TABLE recnik (
    //     id BIGINT(6) AUTO_INCREMENT PRIMARY KEY,
    //     engleski VARCHAR(50) NOT NULL,
    //     srpski VARCHAR(50) NOT NULL,
    //     opis VARCHAR(1024)
    //     )";

    // if ($conn->query($sql) === TRUE) {
    // echo "Uspesna konekcija";
    // } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    // $conn->close();
?>