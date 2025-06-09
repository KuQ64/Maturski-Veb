<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Додавање нових речи</title>
</head>
<body>
    <?php
        include "konekcija.php";
        $srpski = $engleski = $opis = "";
        $srpskierr = $engleskierr = "";

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(empty($_POST["eng"]))
            {
                $engleskierr = "Polje je prazno";
            }
            else
            {
                $engleski = test_input($_POST["eng"]);
            }

            if(empty($_POST["srp"]))
            {
                $srpskierr = "Polje je prazno";
            }
            else
            {
                $srpski = test_input($_POST["srp"]);
            }

            if(!empty($_POST["opis"]))
            {
                $opis = test_input($_POST["opis"]);
            }
        }

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <h1 class="header">Elektronski rečnik</h1>
    <nav class="navBar">
        <ul>
            <li><a href="../index.php">Rečnik</a></li>
            <li><a href="../php/dodavanje.php">Dodavanje novih reči</a></li>
            <li><a href="../php/uputstvo.php">Uputstvo</a></li>
        </ul>
    </nav>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="eng">Engleska reč:</label>
        <input type="text" name="eng" value="<?php echo $engleski;?>">
        <span class="error"><?php echo $engleskierr;?></span>
        <br><br>

        <label for="srp">Srpska reč:</label>
        <input type="text" name="srp" value="<?php echo $srpski;?>">
        <span class="error"><?php echo $srpskierr;?></span>
        <br><br>

        <label for="opis">Opis:</label>
        <textarea name="opis" rows="5" cols="40"><?php echo $opis;?></textarea>
        <br><br>

        <input type="submit" value="Snimi">
        <br>
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(empty($engleskierr) && empty($srpskierr))
            {
                $sql = "INSERT INTO recnik (engleski, srpski, opis) VALUES ('$engleski', '$srpski', '$opis')";

                if($conn->query($sql) === TRUE)
                {
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                }
                else
                {
                    echo "Error: ".$sql."<br>".$conn->error;
                }
            }
        }
    ?>

    <footer>
        © Osnovna škola 'Sonja Marinković'
    </footer>
</body>
</html>