<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<title>Electricity Bill</title>
		<style>
			body{
				background: url('./enbg.png');
				background-size: cover;
			}
			.form-container{
				border: 1px solid;
				border-radius: 15px;
				padding: 35px 60px;
				margin-top: 33%;
				color: white;
			}
			a{
				top: 30%;
				position: absolute;
				right: 10px;
			}
		</style>
		<script>
			$(document).ready(function(){
			    $('[data-toggle="popover"]').popover();   
			});
		</script>
</head>
<body>
	<?php
		$cost = 0;
		$alert = "alert alert-primary";
		$title = "suggest";
		$badge = "badge badge-primary";
		$content = "Please enter a valid number";
		if (isset($_POST['submit'])) {
			# code...
			$units = $_POST['units'];
			if ($units >= 0 && $units <= 50) {
				# code...
				$cost = $units * 9;
				$alert = "alert alert-success";
				$title = "eco-friendly";
				$badge = "badge badge-success";
				$content = "Thank You! You are using electricity wisely";
			}
			elseif ($units > 50 && $units <= 100) {
				# code...
				$units = $units - 50;
				$cost = 450 + $units * 12;
				$alert = "alert alert-warning";
				$title = "warning";
				$badge = "badge badge-warning";
				$content = "Please! Use electricity wisely";
			}
			else if ($units > 100) {
				# code...
				$units = $units - 100;
				$cost = 1050 + $units * 15;
				$alert = "alert alert-danger";
				$title = "danger";
				$badge = "badge badge-danger";
				$content = "Warning! Your electricity consumption is high";
			}
			else
			{
				$cost = "N/A";
				$alert = "alert alert-secondary";
				$badge = "badge badge-secondary";
			}
		}
	?>
	
<div class="container-fluid bg">
	<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<form class="form-container" action="" method="post">
				  <h3>Electrical consumption:</h3>
				  <div class="form-group">
				    <label>Units</label>
				    <input type="text" name="units" class="form-control" placeholder="Enter Units">
				  </div>
				  <div class="form-group">
				  	<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				  </div>
				  <div class="<?php echo $alert; ?>">
				  	<label style="border-spacing: 15px 50px;border-radius: 5px;">Cost: </label><?php echo "&#8377;".$cost; ?>
				  	<a href="#" class="<?php echo($badge); ?>" style="visibility: <?php if(empty($cost)){echo "hidden";} else {echo "visible";} ?>" data-toggle="popover" title="<?php echo($title); ?>" data-content="<?php echo($content); ?>">suggestion</a>
				  </div>
				</form>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				
			</div>
		</div>
	</div>

</body>

</html>