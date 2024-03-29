<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database_name";

$dbh = new PDO('mysql:host=localhost;port=80;dbname=handyman searcher', 'root', '',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

// Fetch handymen based on specialty
if(isset($_GET['specialty'])) {
    $specialty = $_GET['specialty'];
    $sql = "SELECT * FROM handymen WHERE specialty LIKE '%$specialty%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div class='handyman'>
                    <h2>".$row["name"]."</h2>
                    <p>".$row["description"]."</p>
                    <p>Specialty: ".$row["specialty"]."</p>
                  </div>";
        }
    } else {
        echo "No results found";
    }
}

$conn->close();
?>