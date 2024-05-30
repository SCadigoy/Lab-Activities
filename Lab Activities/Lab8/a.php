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

<h2>All Order Details</h2>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT orders.orderNumber, orders.orderDate, customers.customerName, orderdetails.orderLineNumber, products.productName, orderdetails.quantityOrdered, orderdetails.priceEach
FROM orders
INNER JOIN customers ON orders.customerNumber = customers.customerNumber
INNER JOIN orderdetails ON orders.orderNumber = orderdetails.orderNumber
INNER JOIN products ON orderdetails.productCode = products.productCode
ORDER BY `orders`.`orderNumber` ASC, `orderdetails`.`orderLineNumber` ASC";


echo '<table> 
      <tr> 
          <th>orderNumber</th> 
          <th>orderDate</th> 
          <th>customerName</th> 
          <th>orderLineNumber</th> 
          <th>productName</th> 
          <th>quantityOrdered</th> 
          <th>priceEach</th> 
      </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $orderNumber = $row["orderNumber"];
        $orderDate = $row["orderDate"];
        $customerName = $row["customerName"];
        $orderLineNumber = $row["orderLineNumber"];
        $productName = $row["productName"];
        $quantityOrdered = $row["quantityOrdered"];
        $priceEach = $row["priceEach"];

        echo '<tr> 
                  <td>'.$orderNumber.'</td> 
                  <td>'.$orderDate.'</td> 
                  <td>'.$customerName.'</td> 
                  <td>'.$orderLineNumber.'</td> 
                  <td>'.$productName.'</td> 
                  <td>'.$quantityOrdered.'</td> 
                  <td>'.$priceEach.'</td> 
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
