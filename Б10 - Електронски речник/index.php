<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Речник</title>
</head>
<body>
    <?php
        $srpski = $engleski = $opis = "";
        $srpskiPrevod = $engleskiPrevod = "";
        if(isset($_POST["submit"]))
        {
            include './php/konekcija.php';
            $br=0;
            $sql='SELECT * FROM recnik';
            $result = $conn->query($sql);
            $provera=$_POST["smer"];
            if ($provera == "0") 
            {
                $greska = "Molimo izaberite smer prevođenja.";
            }
            if($provera==1)
            {
                $engleski=$_POST["eng"];
                while ($row = $result->fetch_assoc()) 
                {
                    if($engleski==$row["engleski"])
                    {
                        $srpskiPrevod=$row["srpski"];
                        $engleskiPrevod=$engleski;
                        $opis=$row["opis"];
                        $br++;
                    }
                }
            }
            if($provera==2)
            {
                $srpski=$_POST["srp"];
                while ($row = $result->fetch_assoc()) 
                {
                    if($srpski==$row["srpski"])
                    {
                        $engleskiPrevod=$row["engleski"];
                        $srpskiPrevod=$srpski;
                        $opis=$row["opis"];
                        $br++;
                    }
                }
            }
            if($br==0)
            {
                $greska="Greška!";
                $srpski = $engleski = $opis = "";
                $srpskiPrevod = $engleskiPrevod = "";
            }
            else
            {
                $greska="";
            }
        }
    ?>
    <h1 class="header">Elektronski rečnik</h1>
    <nav class="navBar">
        <ul>
            <li><a href="index.php">Rečnik</a></li>
            <li><a href="./php/dodavanje.php">Dodavanje novih reči</a></li>
            <li><a href="./php/uputstvo.php">Uputstvo</a></li>
        </ul>
    </nav>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="smer">Smer:</label>
        <select onchange="promeni(value)" name="smer" id="smer">
            <option value="0">Selektuj smer prevođenja</option>
            <option value="1">Engleski u srpski</option>
            <option value="2">Srpski u engleski</option>
        </select>
        <br><br>

        <label for="eng">Engleska reč:</label>
        <input type="text" name="eng" value="<?php echo $engleskiPrevod;?>">
        <br><br>

        <label for="srp">Srpska reč:</label>
        <input type="text" name="srp" value="<?php echo $srpskiPrevod;?>">
        <br><br>

        <label for="opis">Opis:</label>
        <textarea name="opis" rows="5" cols="40"><?php echo $opis;?></textarea>
        <br><br>

        <input type="submit" name="submit" value="Prevedi">
        <br>
    </form>

    <footer>
        © Osnovna škola 'Sonja Marinković'
    </footer>

    <script src="./js/custom.js"></script>
</body>
</html>