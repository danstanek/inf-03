<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rozgrywki futbolowe</title>
        <link rel="stylesheet" href="styl.css">
    </head>

    <body>
        <div class="baner">
            <h2>Swiatowe rozgrywki piłkarskie</h2>
            <img src="obraz1.jpg" alt="boisko">

        </div>

        <section class="mecze">
    
            <?php
            $connect=mysqli_connect("localhost", "root", "", "egzamin");

            $zapytanie = "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1='EVG';";
            $ex=mysqli_query($connect, $zapytanie);
            while($linia=mysqli_fetch_row($ex)){
                echo <<<FRIEND
                <div class='roz'>
                  <h3>$linia[0]-$linia[1]</h3>
                <h4>$linia[2]</h4>
                  w dniu: $linia[3]
                 </div>
              FRIEND;
        }


            mysqli_close($connect);
            ?>
       
    </section>
        

        <div class="glowny">
            <h2>Reprezentacja</h2>

        </div>

        <div class="lewy">
                <p>Podaj pozycje zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
                <form name="formularz" method="POST" action="futbol.php">
                    <input type="number" name="numerek">
                    <input type="submit" value="Sprawdź">
                    </form>
                    <ul>
                    <?php
                     $connect=mysqli_connect("localhost", "root", "", "egzamin");
                if (isset($_REQUEST['numerek']) && $_REQUEST['numerek'] != "") {
                    $qrr = $connect->prepare("SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = ?");
                    $qrr->bind_param("i", $_REQUEST['numerek']);
                    $qrr->execute();
                    $result = $qrr->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $i = $row['imie'];
                        $n = $row['nazwisko'];
                        echo "<li>$i $n</li>";
                    }
                    mysqli_close($connect);
                    header("Location: /egzamin2019e14/tn/futbol.php");
                    exit();
                }
               
                ?>
                    </ul>
               

        </div>

        <div class="prawy">
            <img src="zad1.png" alt="piłkarz">
            <p>Autor: 022131mmmm</p>
        </div>
    </body>
</html>
