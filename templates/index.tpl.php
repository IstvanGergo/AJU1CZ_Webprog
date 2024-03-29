<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>

    <link rel="stylesheet" href="./style/stilus.css" type="text/css">
    <?php if(file_exists('./style/'.$keres['fajl'].'.css')) 
        { ?><link rel="stylesheet" href="./style/<?= 
        $keres['fajl']?>.css" type="text/css">
    <?php } ?>
</head>
<body>
<header>
    <h1><?= $fejlec['cim'] ?></h1>
    <?php if (isset($fejlec['motto'])) { ?><h2><?= $fejlec['motto'] ?></h2><?php } ?>
</header>
    <div id="wrapper">
        <aside id="nav"> 
            <nav>
                <ul> 
                    <?php foreach ($oldalak as $url => $oldal) { if($oldal['menu'])
                        { ?>
                        <li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
                        <a href="index.php<?= ($url == '/') ? '' : ('?oldal=' . $url) ?>">
                        <?= $oldal['szoveg'] ?></a>
</li>
<?php 
}} ?>

                </ul>
            </nav>
        </aside>
        <div id="content">
            <?php include_once "./templates/pages/{$keres['fajl']}.tpl.php"; ?>
        </div>
    </div>
    
</body>
<footer>
    <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?><?php } ?>
    &nbsp;
    <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>
</footer>
</html>