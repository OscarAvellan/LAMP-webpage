// Created by Oscar Avellan

<html>
<body>
<?php

include 'connect.php';

//Count items in the order
$count = 0;

//Set the Autocommit to false
mysqli_autocommit($con,FALSE);

if (mysqli_connect_errno()) {
	echo "Could not connect to MySQL for the following reason: " . mysqli_connect_error();
}

$sql_string = "INSERT INTO `Order` VALUES(DEFAULT,NOW(),'";
$staffMember = str_replace(' ','',$_POST['staffMember']);

//Checks if the Staff Member field is empty
if(empty($_POST['staffMember'])){
	die( "ERROR: The Staff Member Field can't be empty"); }

//Checks if the Staff Member field is all letters
else if( !ctype_alpha($staffMember)){
	die( "ERROR: Invalid input for field 'StaffMember' ");}

//Checks if the Customer details is empty
else if( empty($_POST['customerDetails'])  ){
	die("ERROR: The Customer Details field can't be empty"); }

//Creates a new Order
else{
	$sql_string = $sql_string.$_POST['staffMember']."' , '".$_POST['customerDetails']."' ); ";

	if(!mysqli_query($con,$sql_string)){
	die( "Error: " . $sql_string . "<br>" . mysqli_error($con)); }
}

//Query to get the id from the last order inserted
$sql_order = "SELECT idOrder FROM `Order` ORDER BY idOrder DESC LIMIT 1;";
$result = mysqli_query($con,$sql_order);
$row = mysqli_fetch_array($result);

$sql_spatula = "SELECT QuantityInStock FROM Spatula WHERE idSpatula = ";

foreach($_POST['SpatulaId'] as $i => $item){
	$sql_query = $sql_spatula;

	//Checks if the quantity is a number
	if( is_numeric($_POST['quantity'][$i]) ){
		//Query to check for the Spatula's Quantity in Stock
		$sql_query = $sql_query.$_POST['SpatulaId'][$i]." ;";
		$result1 = mysqli_query($con,$sql_query);
		$row1 = mysqli_fetch_array($result1);

		//Checks if the quantity is valid
		if(($_POST['quantity'][$i] > 0) && ($_POST['quantity'][$i] <= $row1['QuantityInStock'])){
			$sql_insert = "INSERT INTO OrderLineItem VALUES(".$_POST['SpatulaId'][$i]." , ".$row['idOrder']." , "
			.$_POST['quantity'][$i]." );";

			//Inserts the Order's spatulas
			if( !mysqli_query($con,$sql_insert) ){
			die("Error: " . $sql_insert . "<br>" . mysqli_error($con) );}

			$sql_update = "UPDATE Spatula SET QuantityInStock = ".($row1['QuantityInStock'] - $_POST['quantity'][$i]).
			" WHERE idSpatula = ".$_POST['SpatulaId'][$i]." ;";

			//Updates the Spatula's quantities in stock
			if( !mysqli_query($con,$sql_update) ){
				die( "Error: " . $sql_update . "<br>" . mysqli_error($con) ); }

			$count += 1;
		}
		else if($_POST['quantity'][$i] < 0 || $_POST['quantity'][$i] > $row1['QuantityInStock']){
			die("ERROR: Invalid Input for field 'Quantity'");
		}
	}
	else{
		die("ERROR: Invalid Input for field 'Quantity'");}

}

if($count === 0){
	mysqli_rollback($con);
	die("Unsuccessfull order, the order doesn't have any products");
}

//Commit the tarnsaction
if(mysqli_commit($con)){
	die("The Order was successfully placed");
}
else{
	die("ERROR: There was a problem with the transaction");
}

//Close connection to database
mysqli_close($con);
?>

</body>
</html>
