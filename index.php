<?php
    
    $aOldalHiba = false;
    $aOldalHibaUzenet = '';
    $bOldalHiba = false;
    $bOldalHibaUzenet = '';
    $sikeresUzenet = '';
    $terulet = '';
    $kerulet = '';

    $sikeresSzamolas = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (empty($_POST['oldal_a'])) {
            $aOldalHiba = true;
            $aOldalHibaUzenet = "Nem adtál meg számot";
        } elseif ($_POST['oldal_a'] < 0) {
            $aOldalHiba = true;
            $aOldalHibaUzenet = "Nem lehet negatív";
        } else {
            $aOldal = htmlspecialchars($_POST['oldal_a'], ENT_QUOTES);
        }

        if (empty($_POST['oldal_b'])) {
            $bOldalHiba = true;
            $bOldalHibaUzenet = "Nem adtál meg számot";
        } elseif ($_POST['oldal_b'] < 0) {
            $bOldalHiba = true;
            $bOldalHibaUzenet = "Nem lehet negatív";
        } else {
            $bOldal = htmlspecialchars($_POST['oldal_b'], ENT_QUOTES);
        }

        if (!$aOldalHiba && !$bOldalHiba) {
            $sikeresUzenet = "Sikeres";
            $terulet = 'Terület: ' . ($aOldal * $bOldal);
            $kerulet = 'Kerület: ' . ($aOldal + $bOldal);
            $sikeresSzamolas = true;
        }
    }



?><!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Téglalapos számonkérés</title>
    <link rel="stylesheet" href="main.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <?php if (!$sikeresSzamolas) {?>
    <div class="container">
        <form method="POST">
            <div class="bg-primary">
                <label>
                    A téglalap egyik oldala: <br />
                    <input type='number' name='oldal_a' value="<?php echo isset($_POST["oldal_a"]) ? $_POST["oldal_a"] : ''; ?>" class="bg-dark">
                </label>
                <div class='hibauzenet'><?php echo $aOldalHibaUzenet; ?></div>
            </div>
            <div>
                <label>
                    A téglalap másik oldala: <br />
                    <input type='number' name='oldal_b' value="<?php echo isset($_POST["oldal_b"]) ? $_POST["oldal_b"] : ''; ?>">
                </label>
                <div class='hibauzenet'><?php echo $bOldalHibaUzenet; ?></div>
            </div>
            <div>
                <input type="submit" value="Feldolgoz">
            </div>
        </form>
    </div>
    <?php } else { ?>
    <p class="sikeres"><?php echo $sikeresUzenet; ?></p>
    <p><?php echo $terulet; ?></p>
    <p><?php echo $kerulet; ?></p>
    <div id="teglalap" style="width: <?php echo $aOldal?>px; height: <?php echo $bOldal?>px;"></div>
    <?php } ?>
</body>
</html>
<!--
NEVEM:Szalai Szabolcs
OSZTÁLYOM: 14S
1. feladatrész:
 - szerepel az űrlapban mindkét oldal bekérése 1 pont/1 pont
 - szerepel az oldalban submit gomb: 1 pont/1 pont
 - a submit felírata: "feldolgoz" 1 pont/1 pont
 - az űrlap POST metódussal küldi tovább a adatokat 1 pont/1 pont
 
2. feladatrész:
 - csak akkor fut le a kód, ha a formot elküldted 1 pont/1 pont
 - elkészültek a validációk  3 pont/3 pont
 - hibaüzenet csak akkor jelenjen meg, ha ténylegesen is történt validációs hiba 1 pont/1 pont
 - a "Sikeres" üzenet csak akkor jelenjen meg, ha nincs hiba. Ekkor a form ne jelenjen meg. 1 pont/1 pont
 - sikertelen validáció esetén a form-ba töltsük vissza az adatokat 1 pont/1 pont
 
3. feladatrész:
 - sikeres az eredmény kiíratása: 3 pont/3 pont
 - helyesen számoltad a kerületet, területet: 1 pont/1 pont
-->
