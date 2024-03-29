<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handyman Searcher Regisztráció</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <form action = "logicals/regisztracio.php" method = "post">
        <fieldset>
          <legend>Regisztráció</legend>
          <br>
          <input type="text" name="email" placeholder="Email" required><br><br>
          <input type="text" name="surname" placeholder="Vezetéknév" required><br><br>
          <input type="text" name="forename" placeholder="Keresztnév" required><br><br>
          <input type="text" name="username" placeholder="Felhasználói név" required><br><br>
          <input type="password" name="password" placeholder="Jelszó" required><br><br>
          <input type="submit" name="regisztracio" value="Regisztráció">
          <br>&nbsp;
        </fieldset>
      </form>
</body>
