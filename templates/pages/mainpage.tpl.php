<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handyman Searcher</title>
    <script src="logicals/printworkers.js"></script>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <div id="content-wrap">
    <?php if(isset($_SESSION['User_Name'])){?>
        <nav>
        <ul>
            <li><form action="javascript:;" name="Szakmák" onsubmit="SearchByProf()" method="get">
                <select name="Szakmák">
                <option value="initval" selected>Milyen szakit keresel?</option>
                <option value="Asztalos">Asztalos</option>
                <option value="Ács">Ács</option>
                <option value="Burkoló">Burkoló</option>
                <option value="Festő">Festő</option>
                <option value="Fűtésszerelő">Fűtésszerelő</option>
                <option value="Gázszerelő">Gázszerelő</option>
                <option value="Kertész">Kertész</option>
                <option value="Lakatos">Lakatos</option>
                <option value="Ötvös">Ötvös</option>
                <option value="Szabó">Szabó</option>
                <option value="Vízszerelő">Vízszerelő</option>
                <option value="Villanyszerelő">Villanyszerelő</option>
                </select>
                <button type="submit"name="submit">Keresés</button>
                </form>
            </li>
        </ul>
    </nav>
    <div id = workers-container>
    </div>
    <?php } else { ?>
    <h1>
        Szakembert keres? Jó helyen jár!
    </h1>
    <h2>
        Itt megtalálja országszerte a legjobb szakembereket! <br>
        Kérjük regisztráljon, vagy jelentkezzen be!
    </h2>
    <?php ;}?>
    </div>
</body>
</html>
