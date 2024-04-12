<?php session_start();
if(file_exists('./logicals/'.$keres['fajl'].'.php'))
{
    include_once "./logicals/{$keres['fajl']}.php";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $ablakcim['cim'] ?></title>
	<link rel="stylesheet" href="./styles/stilus.css" type="text/css">
	<?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?>
        <link rel="stylesheet" href="./styles/<?= $keres['fajl']?>.css" type="text/css"><?php
        } ?>
</head>
<body>
	<header>
	<h1>
        <img src="./images/<?=$fejlec['kepforras']?>" alt="<?=$fejlec['kepalt']?>" width="60" height="60">
        <?= $fejlec['cim'] ?>
    </h1>
		<?php if(isset($_SESSION['User_Name'])) { ?>
            Bejelentkezve:
            <strong><?= $_SESSION['User_Forename']."
            ".$_SESSION['User_Surname']."
            (".$_SESSION['User_Name'].")" ?></strong><?php
            } ?>
	</header>
    <div id="wrapper">
        <aside id="nav">
            <nav>
                <ul>
					<?php foreach ($oldalak as $url => $oldal) { ?>
						<?php if(! isset($_SESSION['User_Name']) && $oldal['menu'][0] || isset($_SESSION['User_Name']) && $oldal['menu'][1]) { ?>
							<li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
							<a href="<?= ($url == '/') ? '.' : ('?oldal=' . $url) ?>">
							<?= $oldal['szoveg'] ?></a>
							</li>
						<?php } ?>
					<?php } ?>
                </ul>
            </nav>
        </aside>
        <div id="content">
            <?php include_once "./templates/pages/{$keres['fajl']}.tpl.php"; ?>
        </div>
    </div>
    <footer>
        <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
		&nbsp;
        <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>
    </footer>
</body>
</html>
