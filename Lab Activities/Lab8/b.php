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

<h2>All Customers' Order Status</h2>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT `customers`.`customerNumber`, `customers`.`customerName`, `orders`.`orderNumber`, `orders`.`status`
FROM `customers` 
	LEFT JOIN `orders` ON `orders`.`customerNumber` = `customers`.`customerNumber`";


echo '<table> 
      <tr> 
          <th>customerNumber</th> 
          <th>customerName</th> 
          <th>orderNumber</th> 
          <th>status</th> 
      </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
       
        $customerNumber = $row["customerNumber"];
        $customerName = $row["customerName"];
        $orderNumber = $row["orderNumber"];
        $status = $row["status"];

        echo '<tr> 
                  <td>'.$customerNumber.'</td> 
                  <td>'.$customerName.'</td> 
                  <td>'.$orderNumber.'</td> 
                  <td>'.$status.'</td>  
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
