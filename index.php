<?php
include_once './includes/config.inc.php';
if (isset($_GET['oldal'])) { // ha a címlaptól eltérő oldal hivatkozására kattintunk
    $oldal = $_GET['oldal'];
// Ha az $oldalak tömbben fel lett véve a $_GET['oldal'] értéke és létezik a ./templates/pages/ mappában a
// hozzá tartozó .tpl.php fájl:
if (isset($oldalak[$oldal]) &&
file_exists("./templates/pages/{$oldalak[$oldal]['fajl']}.tpl.php")) {
// $keres –be az oldalak tömb adott sorát teszi, ami szintén egy tömb.
// vagyis a $keres tömb adatával azonosítja, hogy melyik oldalt és onnan mit kell betöltenie
$keres = $oldalak[$oldal];
}
elseif (isset($extrak[$oldal]) &&
file_exists("./templates/pages/{$extrak[$oldal]['fajl']}.tpl.php")) {
$keres = $extrak[$oldal];
}
else {
// különben hiba
$keres = $hiba_oldal;
header("HTTP/1.0 404 Not Found");
}
}

else {
    $keres = $oldalak['/'];
}


include_once './templates/index.tpl.php';
// templates/index.tpl.php végzi el a fő feladatot, az index.php-ban is lehetne
// ./ jelentése: az adott munka-mappa
