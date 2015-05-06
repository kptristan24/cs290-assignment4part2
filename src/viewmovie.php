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
            <li><a href="addmovie.php">Add</a></li>
            <li class="active"><a href="viewmovie.php">View</a></li>
			<li><a href="deletemovie.php">Delete</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">


		<br><br>
		<div class="jumbotron">
			<h1>View movies!</h1>
			<p>Here you can view ALL movies in the database. You may sort by category using the dropdown.</p>

		</div>
		
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    All <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#">All</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
  </ul>
</div>
		
		<div class="container-fluid">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th>Category</th>
						<th>Length</th>
						<th>Checked Out</th>
					</tr>
				</thead>
				<tbody>	
			<?php
				$sql = "SELECT name, category, length, rented FROM Movies;";
				foreach($pdo->query($sql) as $row){
					echo '<tr>';
						echo '<td>' . $row['name'] . '</td>';
						echo '<td>' . $row['category'] . '</td>';
						echo '<td>' . $row['length'] . '</td>';
						echo '<td>' . $row['rented'] . '</td>';
						
					echo '</tr>';
				};
			?>
				</tbody>
			</table>
		</div>
		
		
		</body>
		
		
		
		
<?php
	if(isset($_POST["deleteall"])){
		echo '<div class="alert alert-success" role="alert"><strong>C\'est Fini!</strong> Movies successfully deleted :)</div>';
		
		//$1sql = "INSERT INTO Items (item_name, item_level, slot, primary_stat) VALUES ('".$item_name."','".$item_level."','".$slot."','".$primary_stat."')";

		$sql = "TRUNCATE TABLE Movies;";

		$delete = $pdo->prepare($sql);
		$delete->execute();
	
	}
	
?>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../../libraries/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

  </body>
</html>


