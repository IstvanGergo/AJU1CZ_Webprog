<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=handyman searcher', 'root', '');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    $handymans_query= "SELECT DISTINCT handymans.Handyman_ID, handymans.Handyman_Name, handymans.Handyman_Phonenum
                       FROM handymans";
    $professions_query = "SELECT DISTINCT handymans.Handyman_ID, professions.Profession_Name
                          FROM handymans 
                          INNER JOIN handymans_professions ON handymans.Handyman_ID = handymans_professions.Handyman_ID
                          INNER JOIN professions ON handymans_professions.Profession_ID = professions.Profession_ID";
    $cities_query = "SELECT DISTINCT handymans.Handyman_ID, cities.City_Name
                     FROM handymans 
                     INNER JOIN cities_handymans ON handymans.Handyman_ID = cities_handymans.Handyman_ID
                     INNER JOIN cities ON cities.City_ID = cities_handymans.City_ID";

    $sth = $dbh->prepare($handymans_query);
    $sth->execute();
    $handymans_row = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = $dbh->prepare($professions_query);
    $sth->execute();
    $professions_row = $sth->fetchAll(PDO::FETCH_ASSOC);
    
    $sth = $dbh->prepare($cities_query);
    $sth->execute();
    $cities_row = $sth->fetchAll(PDO::FETCH_ASSOC);
    $data = array();
    $data = $handymans_row;
    if ($handymans_row && $professions_row  && $cities_row ) {
        for($i=0; $i<count($handymans_row);$i++){
            $handymans_row[$i]['Cities'] = array();
            $handymans_row[$i]['Professions'] = array();
            foreach($cities_row as $cities) {
                if($cities['Handyman_ID'] == $handymans_row[$i]['Handyman_ID']){
                    $handymans_row[$i]['Cities'][] = $cities['City_Name'];
                }
            }
            foreach($professions_row as $professions) {
                if($professions['Handyman_ID'] == $handymans_row[$i]['Handyman_ID']){
                    $handymans_row[$i]['Professions'][] = $professions['Profession_Name'];
                }
            }
        }
        echo json_encode(array_values($handymans_row), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        
    }

    else{
        echo "Hiba!";
    }
}
    catch (PDOException $e) {
        echo "Hiba: ".$e->getMessage();
    }