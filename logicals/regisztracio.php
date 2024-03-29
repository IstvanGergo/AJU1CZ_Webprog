<?php
    if(isset($_POST['email'])
    && isset($_POST['surname'])
    && isset($_POST['forename'])
    && isset($_POST['username'])
    && isset($_POST['password'])) {
        try {
            // Kapcsolódás
            $dbh = new PDO('mysql:host=localhost;port=80;dbname=handyman searcher', 'root', '',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            // Létezik már a felhasználói név?
            $sqlSelect = "select User_ID from users where User_Name = :username OR User_Email = :email";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':username' => $_POST['username']));
            $sth->execute(array(':email' => $_POST['email']));

            if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $uzenet = "A felhasználónév vagy email már foglalt!";
                $ujra = "true";
            }
            else {
                // Ha nem létezik, akkor regisztráljuk
                $sqlInsert = "insert into users(User_ID, User_Name, User_Email, User_Surname, User_Forename, User_Password)
                              values(0, :username, :email, :surname, :forename, :password)";
                $stmt = $dbh->prepare($sqlInsert);
                $stmt->execute(array(':email' => $_POST['email'], ':surname' => $_POST['surname'],
                                     ':forename' => $_POST['forename'], ':username' => $_POST['username'],
                                     ':password' => sha1($_POST['password']))); 
                if($count = $stmt->rowCount()) {
                    $newid = $dbh->lastInsertId();
                    $uzenet = "A regisztrációja sikeres.<br>Azonosítója: {$newid}";
                    $ujra = false;
                }
                else {
                    $uzenet = "A regisztráció nem sikerült.";
                    $ujra = true;
                }
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
        <title>Regisztráció</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php if(isset($uzenet)) { ?>
            <h1><?= $uzenet ?></h1>
            <?php if($ujra) { ?>
                <a href="pelda.html">Próbálja újra!</a>
            <?php } ?>
        <?php } ?>
    </body>
</html>
