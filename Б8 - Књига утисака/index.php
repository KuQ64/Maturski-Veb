<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Knjiga utisaka</title>
</head>
<body>
    <?php
        include "./php/konekcija.php";
        $ime = $mejl = $koment = "";
        $imeerr = $mejlerr = $komenterr = "";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(empty($_POST["ime"]))
            {
                $imeerr = "Ime je obavezno polje";
            }
            else
            {
                $ime = test_input($_POST["ime"]);
            }

            if(empty($_POST["mejl"]))
            {
                $mejlerr = "Email je obavezno polje";
            }
            else
            {
                $mejl = test_input($_POST["mejl"]);
                if (!filter_var($mejl, FILTER_VALIDATE_EMAIL)) 
                {
                    $mejlerr = "Invalidan format email-a";
                }
            }

            if(empty($_POST["komentar"]))
            {
                $komenterr = "Komentar je obavezno polje";
            }
            else
            {
                $koment = test_input($_POST["komentar"]);
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
    <h1 class="header">Knjiga utisaka</h1>
    <nav class="navBar">
        <ul>
            <li><a href="index.php">Početna</a></li>
            <li><a href="./html/autor.html">O autoru</a></li>
            <li><a href="./html/uputstvo.html">Uputstvo</a></li>
        </ul>
    </nav>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="ime">IME:</label>
        <input type="text" name="ime" value="<?php echo $ime;?>">
        <span class="error"><?php echo $imeerr;?></span>
        <br><br>

        <label for="email">EMAIL:</label>
        <input type="text" name="mejl" value="<?php echo $mejl;?>">
        <span class="error"><?php echo $mejlerr;?></span>
        <br><br>

        <label for="komentar">KOMENTAR:</label>
        <textarea name="komentar" rows="5" cols="40"><?php echo $koment;?></textarea>
        <span class="error"><?php echo $komenterr;?></span>
        <br><br>

        <input type="submit" value="Dodaj komentar">
        <br>
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(empty($imeerr) && empty($mejlerr) && empty($komenterr))
            {
                $sql = "INSERT INTO utisak (email, ime, komentar) VALUES ('$mejl', '$ime', '$koment')";

                if($conn->query($sql) === TRUE)
                {
                    echo " ";
                }
                else
                {
                    echo "Error: ".$sql."<br>".$conn->error;
                }
            }

            $conn->close();
        }
    ?>

    <footer>
        © Muzeji Srbije
    </footer>
</body>
</html>