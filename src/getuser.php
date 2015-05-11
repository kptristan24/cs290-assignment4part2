<?php include 'dbconn.php'; ?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php

$sql = "UPDATE Movies SET rented='" . $_POST['rent'] . "' WHERE name='" . $_POST['name'] . "'; ";
$query = $pdo->prepare($sql);
$query->execute();

if(isset($_GET["rent"])){
//echo ' aids ';
}
//echo '<br>' . $_GET["rent"];

//echo $sql;
$q = $_GET['q'];


$con = mysqli_connect('oniddb.cws.oregonstate.edu','harit-db','Z40YK7UbNXNGDFMx','harit-db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");

if($q == -1){
	$sql = "SELECT * FROM Movies";
}else{
	$sql="SELECT * FROM Movies WHERE category = '".$q."'";
}

$result = mysqli_query($con,$sql);
//echo '<form action="viewmovie.php" method="get"><input type="hidden" name="rent" value="1" class="form-control" aria-describedby="basic-addon1"><button class="btn btn-default" type="submit">Rent</button></td>';

//echo '<br><br>I got: ' . $q;

echo "<div class='container-fluid'>
			<table class='table table-striped'>
				<thead>
					<tr>
						<th>Name</th>
						<th>Category</th>
						<th>Length</th>
						<th>Checked Out</th>
					</tr>
				</thead>";
				
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['category'] . "</td>";
		echo "<td>" . $row['length'] . "</td>";
		if($row['rented'] == 0){
			echo '<td><form action="viewmovie.php" method="post">
					<input type="hidden" name="rent" value="1" class="form-control" aria-describedby="basic-addon1">
					<input type="hidden" name="name" value= ' . $row['name'] . 'class="form-control" aria-describedby="basic-addon1">
					<button class="btn btn-default" type="submit">Rent</button></td>';
		}elseif($row['rented'] == 1){
			echo "<td><button>Available</button></td>";
		}
		//echo "<td>" . $row['rented'] . "</td>";
		
		
		echo "</tr>";
}
echo "</tbody></table></div>";
mysqli_close($con);
?>
</body>
</html>
