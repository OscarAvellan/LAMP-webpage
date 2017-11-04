<html>
<head><title>Orders</title><h1>Orders</h1></head>
<body>
<br><br>

<?php

include 'connect.php';

//Query to get the Spatulas that are in stock
$sql_string = "SELECT * FROM Spatula WHERE QuantityInStock > 0 ORDER BY idSpatula ASC;";
$result = mysqli_query($con,$sql_string);

//Create a form
echo "<form method = 'post' action='part1Order.php' id = 'formOrder'>";
echo "<p>Customer Details</p>";
echo "<textarea name='customerDetails' rows = '4' cols = '50'></textarea><br>";
echo "<br>Responsible Staff Member: ";
echo "<input type = 'text' name = 'staffMember' /><br><br>";

echo "<table border = '2' >";
echo "<tr><td align = 'center'>Spatula ID</td>";
echo "<td align = 'center'>Name</td>";
echo "<td align = 'center'>Type</td>";
echo "<td align = 'center'>Size</td>";
echo "<td align = 'center'>Colour</td>";
echo "<td align = 'center'>Price</td>";
echo "<td align = 'center'>Quantity Currently In Stock</td>";
echo "<td align = 'center'>Order Quantity</td></tr>";

//Show each Spatula that is in stock
while($row = mysqli_fetch_array($result)){
	echo "<tr><td><input type = 'number' name = 'SpatulaId[]' value = '".$row['idSpatula']."' readonly></td>";
	echo "<td align = 'center'>".$row['ProductName']."</td>";
	echo "<td align = 'center'>".$row['Type']."</td>";
	echo "<td align = 'center'>".$row['Size']."</td>";
	echo "<td align = 'center'>".$row['Colour']."</td>";
	echo "<td align = 'center'>".$row['Price']."</td>";
	echo "<td align = 'center'>".$row['QuantityInStock']."</td>";
	echo "<td align = 'center'><input type = 'number' name = 'quantity[]' value = '0' min = '0' max = '".$row['QuantityInStock']."' ></td>";
	echo "</tr>";	
}

echo "</table>";
echo "<br><input type = 'submit' value = 'Submit'>";
echo "</form>";

//Close connection to database
mysqli_close($con);
?>
</body>
</html>
