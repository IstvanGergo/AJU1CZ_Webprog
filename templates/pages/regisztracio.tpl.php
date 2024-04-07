<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handyman Searcher Regisztráció</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <form action = "?oldal=regisztral" method = "post">
        <fieldset>
          <legend>Regisztráció</legend>
          <br>
          <input type="text" name="User_Email" placeholder="Email" required><br><br>
          <input type="text" name="User_Surname" placeholder="Vezetéknév" required><br><br>
          <input type="text" name="User_Forename" placeholder="Keresztnév" required><br><br>
          <input type="text" name="User_Name" placeholder="Felhasználónév" required><br><br>
          <input type="password" name="User_Password" placeholder="Jelszó" required><br><br>
          <input type="submit" name="regisztracio" value="Regisztráció">
          <br>&nbsp;
        </fieldset>
      </form>
</body>
