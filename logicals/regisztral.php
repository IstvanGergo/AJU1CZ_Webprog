<?php
if(isset($_POST['User_Email'])
&& isset($_POST['User_Surname'])
&& isset($_POST['User_Forename'])
&& isset($_POST['User_Name'])
&& isset($_POST['User_Password'])) {
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=handyman searcher', 'root', '');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        // Létezik már a felhasználói név?
        $sqlSelect = "select User_ID from users where User_Name = :username";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':username' => $_POST['User_Name']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $uzenet = "A felhasználónév már foglalt!";
            $ujra = true;
        }

        else {
            // Ha nem létezik, akkor regisztráljuk
            $sqlInsert = "insert into
                            users(User_ID, User_Name, User_Email, User_Surname, User_Forename, User_Password)
                            values(0, :username, :email, :surname, :forename, :password)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(':email' => $_POST['User_Email'], ':surname' => $_POST['User_Surname'],
                                    ':forename' => $_POST['User_Forename'], ':username' => $_POST['User_Name'],
                                    ':password' => sha1($_POST['User_Password'])));
            $count = $stmt->rowCount();
            if($count) {
                $newid = $dbh->lastInsertId();
                $uzenet = "A regisztrációja sikeres.<br>Azonosítója: {$newid}";
                $ujra = false;
            }
            else {
                $uzenet = "A regisztráció nem sikerült.";
                $ujra = true;
            }
        }
        $dbh = null;
    }
    catch (PDOException $e) {
        echo "Hiba: ".$e->getMessage();
    }
}

