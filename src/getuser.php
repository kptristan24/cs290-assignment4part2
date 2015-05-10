<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
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
		echo "<td>" . $row['rented'] . "</td>";
		echo "</tr>";
}
echo "</tbody></table></div>";
mysqli_close($con);
?>
</body>
</html>
