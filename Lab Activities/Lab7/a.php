<!DOCTYPE html>
<html>
<head>
    <title>MySQL Database Content</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: rosybrown;
        }
    </style>
</head>
<body>

<h2>All Employees in the Company</h2>

<html>
<body>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT `employees`.`firstName`, `employees`.`lastName`, `employees`.`jobTitle`
          FROM `employees`";

echo '<table> 
      <tr> 
          <th> First Name </th> 
          <th> Last Name </th> 
          <th> Job Title </th> 
      </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $firstName = $row["firstName"];
        $lastName = $row["lastName"];
        $jobTitle = $row["jobTitle"];

        echo '<tr> 
                  <td>'.$firstName.'</td> 
                  <td>'.$lastName.'</td> 
                  <td>'.$jobTitle.'</td> 
              </tr>';
    }
    $result->free();
    echo '</table>';
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
</body>
</html>