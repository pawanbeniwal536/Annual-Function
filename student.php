<?php
if (isset($_GET['submit'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Registration";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $Name = $_GET['Name']; 

    $sql = "SELECT * FROM StudentRegistration WHERE `First Name` = '$Name'";
    $result = $conn->query($sql);
    

    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<h1>Search result </h1>";
        while ($row = $result->fetch_assoc()) {
            echo "Roll No: " . $row['Roll No'] . "<br>";
            echo "First Name: " . $row['First Name'] . "<br>";
            echo "Middle Name: " . $row['Middle Name'] . "<br>";
            echo "Last Name: " . $row['Last Name'] . "<br>";
            echo "Father Name: " . $row['Father Name'] . "<br>";
            echo "Class: " . $row['Class'] . "<br>";
            echo "Gender: " . $row['Gender'] . "<br>";
            echo "Mobile No.: " . $row['Mobile No.'] . "<br>";
            echo "Address: " . $row['Address'] . "<br>";
            echo "Email: " . $row['Email'] . "<br>
            <br><br><br>";
            
        }
    } else {
        echo "No results found for Name: $Name";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student.css">
    <title>Registered-student</title>
</head>
<body>
    <div class="container-find-students">
        
            
            <form action="" method="GET">
                <div class="search-name-student">
                    Name:
                    <input type="text"name="Name">
                </div>
                
                <div class="find-student-submit">
                    <input class='submit-btn-find-student'type="submit" name="submit" value="Submit">
                </div>
</form>
    </div>
</body>
</html>