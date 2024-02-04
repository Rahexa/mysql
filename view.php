<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Entries</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

    <h2>Student Entries</h2>

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

    // SQL query to retrieve all entries from the Student table
    $sql = "SELECT id, name, institution, year, subject FROM Student";
    $result = $conn->query($sql);

    // Check if there are rows in the result
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Institution</th>
                    <th>Year</th>
                    <th>Subject</th>
                </tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row["id"]}</td>
                    <td>{$row["name"]}</td>
                    <td>{$row["institution"]}</td>
                    <td>{$row["year"]}</td>
                    <td>{$row["subject"]}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No entries found";
    }

    // Close the database connection
    $conn->close();
    ?>

</body>
</html>
