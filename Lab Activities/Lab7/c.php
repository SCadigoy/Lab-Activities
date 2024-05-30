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

<h2>All Employees Whose Jobtitle is Sales Rep or in Office Located with Office Code 1</h2>

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

$query = "SELECT employees.`lastName`, employees.`firstName`, employees.`jobTitle`, employees.`officeCode` 
FROM employees 
WHERE employees.`jobTitle` = 'Sales Rep' OR employees.`officeCode` = 1
ORDER BY employees.`officeCode` ASC, employees.`jobTitle` ASC";

echo '<table> 
      <tr> 
          <th> lastName </th> 
          <th> firstname </th>
          <th> jobTitle </th>
          <th> officeCode </th> 
      </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $lastName = $row["lastName"];
        $firstName = $row["firstName"];
        $jobTitle = $row["jobTitle"];
        $officeCode = $row["officeCode"];
    
        echo '<tr> 
                 <td>'.$lastName.'</td> 
                 <td>'.$firstName.'</td> 
                 <td>'.$jobTitle.'</td> 
                 <td>'.$officeCode.'</td> 
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
