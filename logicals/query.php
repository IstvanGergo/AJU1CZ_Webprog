<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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