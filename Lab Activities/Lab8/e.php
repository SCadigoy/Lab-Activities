<!DOCTYPE html>
<html>
<head>
    <title>MySQL Database Content</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            
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

<h2>All Employees that Don't Sale Represent Any Customer</h2>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT firstname
FROM employees
EXCEPT
    SELECT salesRepEmployeeNumber
    FROM customers
ORDER BY firstname";

echo '<table> 
      <tr> 
          <th>firstname</th> 
      </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
       
        $firstname = $row["firstname"];

        echo '<tr> 
                  <td>'.$firstname.'</td> 
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
