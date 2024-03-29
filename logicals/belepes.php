<?php
    if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
        try {
            // Kapcsolódás
            $dbh = new PDO('mysql:host=localhost;dbname=handyman searcher', 'root', '',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            // Felhasználó keresése
            $sqlSelect = "select User_ID, User_Surname, User_Forename
                          from users where User_Email = :email and User_Password = sha1(:jelszo)";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':email' => $_POST['felhasznalo'], ':jelszo' => $_POST['jelszo']));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            if($row) {
                if(password_verify($_POST['jelszo'], $row['jelszo'])) {
                    $_SESSION['csn'] = $row['csaladi_nev']; $_SESSION['un'] = $row['utonev']; $_SESSION['login'] = $_POST['felhasznalo'];
                }
                else
                    $row = false;
            }
        }
        catch (PDOException $e) {
            echo "Hiba: ".$e->getMessage();
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Belépés</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php if(isset($row)) { ?>
            <?php if($row) { ?>
                <h1>Bejelentkezett:</h1>
                Azonosító: <strong><?= $row['User_ID'] ?></strong><br><br>
                Név: <strong><?= $row['User_Surname']." ".$row['User_Forename'] ?></strong>
            <?php } else { ?>
                <h1>A bejelentkezés nem sikerült!</h1>
                <a href="?oldal=belepes" >Próbálja újra!</a>
            <?php } ?>
        <?php } ?>
    </body>
</html>