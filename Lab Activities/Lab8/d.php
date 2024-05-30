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

<h2>All Customer Who Have At least One Order</h2>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT customerNumber, customerName
FROM customers
WHERE EXISTS (SELECT 1 FROM orders WHERE customerNumber = customerNumber);";


echo '<table> 
      <tr> 
          <th>customerNumber</th>
          <th>customerName</th>  
      </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
       
        $customerName = $row["customerName"];
        $customerNumber = $row["customerNumber"];

        echo '<tr> 
                  <td>'.$customerNumber.'</td> 
                  <td>'.$customerName.'</td>
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
