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

<h2>Employees' Sales Detail</h2>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT `employees`.`employeeNumber`, `customers`.`customerNumber` 
FROM `customers` 
    RIGHT JOIN `employees` ON `employees`.`employeeNumber` = `customers`.`salesRepEmployeeNumber`";


echo '<table> 
      <tr> 
          <th>employeeNumber</th> 
          <th>customerNumber</th> 
      </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
       
        $employeeNumber = $row["employeeNumber"];
        $customerNumber = $row["customerNumber"];

        echo '<tr> 
                  <td>'.$employeeNumber.'</td>
                  <td>'.$customerNumber.'</td> 
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
