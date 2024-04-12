<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handyman Searcher</title>
    <script>src="logicals/mindenmunkas.js"</script>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <?php if(isset($_SESSION['User_Name'])){?>
        <nav>
        <ul>
            <li>
            <a href="keres.php">Keresés</a>
            </li>
            <li><form id="szakik">
                <select name="Szakmák" >
                <option value="initval" selected>Milyen szakit keresel?</option>
                <option value="asztalos">Asztalos</option>
                <option value="acs">Ács</option>
                <option value="burkolo">Burkoló</option>
                <option value="festő">Festő</option>
                <option value="fűtésszerelő">Fűtésszerelő</option>
                <option value="gázszerelő">Gázszerelő</option>
                <option value="kertesz">Kertész</option>
                <option value="lakatos">Lakatos</option>
                <option value="otvos">Ötvös</option>
                <option value="szabo">Szabó</option>
                <option value="villanyszerelo">Villanyszerelő</option>
                <option value="vizszerelo">Vízszerelő</option>
                <option value="villanyszerelo">Villanyszerelő</option>
                </select>
                </form>
            </li>
        </ul>
    </nav>
    <?php } else { ?>
    <h1>
        Szakembert keres? Jó helyen jár!
    </h1>
    <h2>
        Itt megtalálja országszerte a legjobb szakembereket! <br>
        Kérjük regisztráljon, vagy jelentkezzen be!
    </h2>
    <?php ;}?>
</body>
</html>
