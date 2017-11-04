// Created by Oscar Avellan

<html>
<body>
<?php

include 'connect.php';

$sql_string = "SELECT * FROM Spatula WHERE idSpatula = ";

//Checks if value has been passed and build up SQL query
if( !empty($_GET['idSpatula']) ){
	$sql_string = $sql_string.$_GET['idSpatula']." ;";
}
else{
	die("Connection error");
}

//Checks if the query was successfull
if( !mysqli_query($con,$sql_string) ){
		die( "Error: " . $sql_string . "<br>" . mysqli_error($con)); }

$result = mysqli_query($con,$sql_string);
$row = mysqli_fetch_array($result);

//Creates table showing details of the Spatula
echo "<table border = '2'>";
echo "<tr><td align = 'center'>Product ID</td>";
echo "<td align = 'center'>ProductName</td>";
echo "<td align = 'center'>Type</td>";
echo "<td align = 'center'>Size</td>";
echo "<td align = 'center'>Colour</td>";
echo "<td align = 'center'>Price</td>";
echo "<td align = 'center'>Quantity In Stock</td></tr>";
echo "<tr align = 'center'><td>".$row['idSpatula']."</td>";
echo "<td align = 'center'>".$row['ProductName']."</td>";
echo "<td align = 'center'>".$row['Type']."</td>";
echo "<td align = 'center'>".$row['Size']."</td>";
echo "<td align = 'center'>".$row['Colour']."</td>";
echo "<td align = 'center'>".$row['Price']."</td>";
echo "<td align = 'center'>".$row['QuantityInStock']."</td></tr>";

echo "</table>";

mysqli_close($con);
?>

</body>
</html>
