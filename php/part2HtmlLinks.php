// Created by Oscar Avellan

<html>
<body>
<?php

include 'connect.php';

$sql_string = "SELECT ProductName,idSpatula FROM  Spatula WHERE 1 ";

//Building up SQL search query
if( !empty($_GET['SpatulaName']) ){
	$sql_string = $sql_string."AND ProductName LIKE '".$_GET['SpatulaName']."%' ";
}

if( !empty($_GET['type']) ){
	$sql_string = $sql_string."AND Type = '".$_GET['type']."' ";
}

if( !empty($_GET['size']) ){
	$sql_string = $sql_string."AND Size = '".$_GET['size']."' ";
}

if( !empty($_GET['colour']) ){
	$sql_string = $sql_string."AND Colour LIKE '".$_GET['colour']."%' ";
}

if( !empty($_GET['price']) ){
	$sql_string = $sql_string."AND Price = ".$_GET['price']." ";
}

$sql_string = $sql_string." ;";

//Checks if the query was successfull
if(!mysqli_query($con,$sql_string)){
		die( "Error: " . $sql_string . "<br>" . mysqli_error($con)); }

$result = mysqli_query($con,$sql_string);

//Checks if the query returned rows
if(mysqli_num_rows($result) === 0){
	die("ERROR: There are no products that match the desciption");
}

//Creates table showing products return by the query
echo "<table border = '2'>";
echo "<tr><td>Product Name</td></tr>";
while( $row = mysqli_fetch_array($result) ){

	echo "<tr>";
	echo "<td><a href='part2SpatulaDetails.php?idSpatula=".$row['idSpatula']."'>".$row['ProductName']."</a></td></tr>";
}
echo "</table>";

//Close connection to database
mysqli_close($con);
?>

</body>
</html>
