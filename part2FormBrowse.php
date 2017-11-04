<html>
<head><title>Browse</title>
<h1>Browse</h1></head>
<body>
<br><br>

<?php

include 'connect.php';

//Create a form
echo "<form method = 'get' action='part2HtmlLinks.php' id = 'formOrder'>";
echo "Spatula Name : ";
echo "<input type = 'search' name = 'SpatulaName' /><br><br>";

//SQL Query to retrieve the different types of Spatulas
$sql_string = "SELECT DISTINCT Type FROM Spatula ORDER BY Type ASC;";
$result = mysqli_query($con,$sql_string);

echo "<select name='type' >";
echo "<option value = ''>--select type--</option>";
	//List of different Spatula types
	while($row = mysqli_fetch_array($result)){
		echo "<option value='" . $row['Type'] . "'>";
		echo $row['Type'];
		echo "</option>";
	}
echo "</select>";

echo "<br><br>Size: ";
echo "<input type = 'search' name = 'size'><br>";
echo "Colour: ";
echo "<input type = 'search' name = 'colour'><br>";
echo "Price (AU):";
echo "<input type = 'number' name = 'price'><br>";
echo "<br><input type = 'submit' value = 'Search...'>";
echo "</form>";

//Close connection to database
mysqli_close($con);
?>
</body>
</html>
