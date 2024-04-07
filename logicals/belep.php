<?php
if(isset($_POST['User_Email'])
&& isset($_POST['User_Password'])) {
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=handyman searcher', 'root', '');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        // Felhasználó keresése
        $sqlSelect = "select User_Name, User_Surname, User_Forename, User_Password
                    from users where User_Email = :email";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':email' => $_POST['User_Email']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if($row) {
            if(password_verify($_POST['User_Password'], $row['User_Password'])) {
                $_SESSION['User_Forename'] = $row['User_Forename'];
                $_SESSION['User_Surname'] = $row['User_Surname'];
                $_SESSION['User_Name'] = $row['User_Name'];
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
