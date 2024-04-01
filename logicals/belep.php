<?php
if(isset($_POST['felhasznalo']) && isset($_POST['password'])) {
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=handyman searcher', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        // Felhasználó keresése
        $sqlSelect = "select User_ID, User_Name, User_Surname, User_Forename
                      from users where User_Email = :email and User_Password = sha1(:password)";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':email' => $_POST['User_Name'], ':password' => $_POST['password']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if($row) {
            if(password_verify($_POST['password'], $row['password'])) {
                $_SESSION['csn'] = $row['User_Forename'];
                $_SESSION['un'] = $row['User_Surname'];
                $_SESSION['login'] = $_POST['User_Name'];
            }
            else
            {
                $row = false;
            }
                
        }
    }
    catch (PDOException $e) {
        echo "Hiba: ".$e->getMessage();
    }
}
?>