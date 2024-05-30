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

<h2>All Customer Located in California, USA</h2>

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

$query = "SELECT `customers`.`customerName`, `customers`.`country`, `customers`.`state`
FROM `customers`
WHERE `customers`.`country` = 'usa' AND `customers`.`state` = 'ca';";

echo '<table> 
      <tr> 
          <th> customerName </th> 
          <th> country </th> 
          <th> state </th> 
      </tr>';

if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $customerName = $row["customerName"];
        $country = $row["country"];
        $state = $row["state"];

        echo '<tr> 
                  <td>'.$customerName.'</td> 
                  <td>'.$country.'</td> 
                  <td>'.$state.'</td> 
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
