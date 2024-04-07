<?php
$ablakcim = array(
 'cim' => 'István Gergő',
);
$fejlec = array(
 'kepforras' => 'logo.png',
 'kepalt' => 'logo',
 'cim' => 'Handyman Searcher'
);
$lablec = array(
 'copyright' => 'Copyright '.date("Y").'.',
 'ceg' => 'Handyman Searcher'
);
$oldalak = array(
    '/' =>array('fajl' => 'mainpage', 'szoveg' => 'Főoldal', 'menu' => array(1,1)),
    'belepes' =>array('fajl' => 'belepes', 'szoveg' => 'Belépés', 'menu' =>  array(1,0)),
    'kilep' => array('fajl' => 'kilep', 'szoveg' => 'Kilépés', 'menu' => array(0,1)),
    'regisztracio' =>array('fajl' => 'regisztracio', 'szoveg' => 'Regisztráció', 'menu' =>  array(1,0)),
    'profil' =>array('fajl' => 'profil', 'szoveg' => 'Profil', 'menu' =>  array(1,1)),
    'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menu' => array(0,0)),
    'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menu' => array(0,0))
);
$hiba_oldal = array ('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!', 'menu' => 0);
