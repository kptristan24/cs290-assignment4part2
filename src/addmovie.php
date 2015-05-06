<?php include 'dbconn.php'; ?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../favicon.ico">

    <title>MySQL and PHP</title>
    <link href="../../../libraries/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../starter-template.css" type="text/css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://people.oregonstate.edu/~harit/cs_290/cs290-assignment4part2">Assignment 4</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
            <li class="active"><a href="addmovie.php">Add</a></li>
            <li><a href="viewmovie.php">View</a></li>
			<li><a href="deletemovie.php">Delete</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">


		<br><br>
		<div class="jumbotron">
			<h1>Add Movies!</h1>
			<p>Here you can add movies to the database by giving their name, Category, and length. They will automatically be considered checked in if you add them here.</p>
		</div>
		
		
		
		<form action="addmovie.php" method="post">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Name</span>
				<input type="text" name="name" class="form-control" placeholder="Brave Heart, Frozen, Fight Club..." aria-describedby="basic-addon1" required>
		</div><br>
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Category</span>
				<input type="text" name="category" class="form-control" placeholder="Action, Comedy, Romance..." aria-describedby="basic-addon1" required>
		</div><br>
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Length(minutes)</span>
				<input type="text" name="length" class="form-control" placeholder="60, 90, 120" aria-describedby="basic-addon1" required>
		</div><br>
		<button type="submit" class="btn btn-default">Submit</button>
		</form><br><br>
		
<?php
	if(isset($_POST["name"])){
		echo '<div class="alert alert-success" role="alert"><strong>Hooray!</strong> Movie successfully submitted :)</div>';
		
		$name = $_POST['name'];
		$category = $_POST['category'];
		$length = $_POST['length'];
		$rented = 0;

		//$1sql = "INSERT INTO Items (item_name, item_level, slot, primary_stat) VALUES ('".$item_name."','".$item_level."','".$slot."','".$primary_stat."')";

		$sql = "INSERT INTO Movies (name, category, length, rented) VALUES (:name,:category,:length,:rented)";

		$insert = $pdo->prepare($sql);
		$insert->execute(array(':name'=>$name, ':category'=>$category, ':length'=>$length, ':rented'=>$rented));

		
		
		
	}
	
?>
		

		
		

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../libraries/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
  </body>
</html>


