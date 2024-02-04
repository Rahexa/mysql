<?php
// Replace these values with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $institution = $_POST["institution"];
    $year = $_POST["year"];
    $subject = $_POST["subject"];

    // SQL query to insert data into the Student table
    $sql = "INSERT INTO Student ( name, institution, year, subject)
            VALUES ('$name', '$institution', '$year', '$subject')";

    // Check if the insertion was successful
    if ($conn->query($sql) === TRUE) {
        echo "Student information inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
