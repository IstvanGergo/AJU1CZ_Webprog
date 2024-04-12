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
    $data = array();
    $data = $handymans_row;
    $sth = $dbh->prepare($professions_query);
    $sth->execute();
    $professions_row = $sth->fetchAll(PDO::FETCH_ASSOC);

    $sth = $dbh->prepare($cities_query);
    $sth->execute();
    $cities_row = $sth->fetchAll(PDO::FETCH_ASSOC);
    
    if ($professions_row > 0 && $cities_row > 0) {
        foreach($professions_row as $professions) {
            $data[$professions_row['Handyman_ID']]['Profession_Name'] = $professions;
        }
        foreach($cities_row as $cities) {
            $data[$cities_row['Handyman_ID']]['City_Name'][] = $cities;
        }
        return json_encode(array_values($data));
    }

    else{
        echo "Hiba!";
    }
}
    catch (PDOException $e) {
        echo "Hiba: ".$e->getMessage();
    }