<?php 
	session_start();
	$error = "";
	$success = "";
	if (array_key_exists("logout", $_GET)) {
		unset($_SESSION['id']);
		unset($_COOKIE['id']);
		setcookie("id", "", time()-3600);
	}  else if (array_key_exists("id", $_SESSION)) {
		$activeuser = $_SESSION['id'];
	} else if (array_key_exists("id", $_COOKIE)) {
		$activeuser = $_COOKIE['id'];
		$_SESSION['id'] = $_COOKIE['id'];
	} else {
		header("Location: ../");
	}
	include('../submitstudy.php');
	
	include('commentsubmit.php');
	
	function strip_bad_chars($input) {
		$output = preg_replace("/[^a-zA-Z0-9_-]/", "", $input);
		return $output;
		}
		
	include('subtime.php');
			
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> KRS | Study Details </title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!-- Jquery CDN, must come before javascript -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://use.fontawesome.com/8e8de84b59.js"></script>
		<link rel="stylesheet" href="../CSS/main.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	</head>
	<body>
		<div class="header">
			<div class="container">
			<p><?php echo ('<i class="fa fa-user-circle-o" aria-hidden="true"></i> '.$activeuser); ?> Logged In! <a href='../?logout=1'> Log Out </a> </p> <!-- display user ID and logout -->
				<div class="row">
					<div class="col-md-3">
						<h1><b>KRS</b></h1>
					</div>
					<div class="col-md-9">
						<h1> KiGen Research Studies </h1>
					</div>
				</div>
			</div>
		</div> <!-- end header -->
		<div class="menu">
			<div class="container">
				<div class="navbar navbar-default">
					<ul class="nav navbar-nav">
						<li><a href="../">Home</a></li>
						<?php include('newstudy.php'); ?>
							
						<li><a href="../active/">Active Studies</a></li>
						<li><a href="../adduser/">Add KRS Users</a></li>
						<li><a href="../viewuser/">View KRS Users</a></li>
						<li><a href="../closed/">Closed</a></li>
					</ul> <!-- end menu list -->
				</div> <!-- end nav -->
			</div> <!-- end container -->
		</div> <!-- end menu -->
		<div class="main home" >
			<div class="container">
				<div class="row detailspage">
					<div class="col-sm-8 col-md-8 col-lg-8 study" >
						<div class="row">
							<div class="col-md-9 col-xs-6">
								<h3><i class="fa fa-folder-open" aria-hidden="true"></i> Study Details </h3> 
							</div>
							<div class="col-md-3 col-xs-6">
								<!-- Button trigger modal -->
									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#editsubmit" style="margin-top: 15px;">Edit Study Details</button>

									<!-- Modal -->
									<div class="modal fade" id="editsubmit" tabindex="-1" role="dialog" aria-labelledby="editsumbitLabel">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Edit Details</h4>
											</div>
											<div class="modal-body">
												<form method="post" id="editdetails1">
													<div class="form-group">
														<label for="targetdelivery"> Target Delivery Date </label>
														<input type="date" name="targetdelivery" class="form-control" id="targetdelivery" placeholder="">
													</div>
													<div class="form-group radio">
														<label>Study status: </label>
														<label class="radio-inline">
														<input type="radio" name="status" value="4"> Active </label>
														<label class="radio-inline">
														<input type="radio" name="status" value="1"> On-Hold </label>
														<label class="radio-inline">
														<input type="radio" name="status" value="3"> Terminated </label>
													</div>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													<input type="submit" name="editdetails1" class="btn btn-primary" value="Save Changes" ></input>
												</form>
											</div>
											<div class="modal-footer">
											
											<?php echo $error; ?>
											</div>
										</div>
									  </div>
									</div>
							</div>
						</div>
						<?php
							$link = mysqli_connect("shareddb1c.hosting.stackcp.net", "studies-3230eff2", "F9icYbNvKEky", "studies-3230eff2");
							if(isset($_GET['study'])) {
								$studyitem = strip_bad_chars($_GET['study']);
								if (mysqli_connect_error()) {
									die("Database Connection Error");
								} else {
									$query = "SELECT * from studies where name = '".mysqli_real_escape_string($link, $studyitem)."' limit 1";
									$result = mysqli_query($link, $query);
									$row = mysqli_fetch_array($result);
									if ($row['status'] == '1') {
										$status = 'on-hold';
									} elseif ($row['status'] == '2') {
										$status = 'closed';
									} elseif ($row['status'] == '3') {
										$status = 'terminated';
									} else {
										$status = 'active';
										}
									echo<<<EOT

						<p> Crop: <span class="studydetails">{$row['Species']} </span> </p>
						<p> Study Name: <span class="studydetails">{$row['Name']} </span></p>
						<p> Work Type: <span class="studydetails">{$row['WorkType']}</span> </p>
						<p> Study Description: <span class="studydetails">{$row['Description']} </span></p>
						<div style="border-top: 1px solid lightgrey; padding-top: 10px;">
							<p> Target Delivery Date: <span class="studydetails">{$row['TargetDelivery']} </span></p>
							<p> Status: <span class="studydetails">{$status} </span> </p>

						</div>
					</div>
					<div class="col-sm-3 study">
EOT;
}
			} else { echo "error"; }
			?>						
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#followsubmit" style="margin-top: 15px;">Follow</button>
								<!-- Modal -->
								<div class="modal fade" id="followsubmit" tabindex="-1" role="dialog" aria-labelledby="followsumbitLabel">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Follow this study?</h4>
										</div>
										
										<div class="modal-footer">
										
										<form method="post">
											
											<div class="form-group">
												<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
												<input type="submit" value="Yes" class="btn btn-primary" name="follow"></input>
											</div>
										</form>
										</div>
									</div>
								  </div>
								</div>										
						<!-- <h4><i class="fa fa-user" aria-hidden="true"></i> Users: </h4> -->
						
						<?php
							$link = mysqli_connect("shareddb1c.hosting.stackcp.net", "followers-3230c3c5", "w7HZdskR3UgS", "followers-3230c3c5");
							if (mysqli_connect_error()) {
								die("Database Connection Error");
							} else {
								$query = "SELECT * from followers where studyid = '".mysqli_real_escape_string($link, $_GET['study'])."' limit 1";
								$result = mysqli_query($link, $query);
								if (mysqli_num_rows($result) <= 0) {
									echo<<<EOT
									<h4><i class="fa fa-user-secret" aria-hidden="true"></i> Followers: </h4>
EOT;
								}else {
									while( $row = mysqli_fetch_array($result)) {
									echo<<<EOT
						<h4><i class="fa fa-user-secret" aria-hidden="true"></i> Followers: {$row['userid']} </h4>
						<p> {$error} </p>
EOT;
					}
				}
			}
			
			?>
					</div>
				</div>
				<!-- include php for the start - delivery - close sections -->
				<?php include('timeline.php'); ?>
				
				<div class="row detailspage">
					<div class="panel panel-default comments">
						<?php include('comments.php'); ?>
						<div class="panel-body studydetails">
<?php 
		$link = mysqli_connect("shareddb1d.hosting.stackcp.net", "comments-3231e2ee", "3uVeWBKgXZ1w", "comments-3231e2ee");
		$query = "SELECT * from comments where studyid = '".mysqli_real_escape_string($link, $_GET['study'])."' order by date desc";
		$result = mysqli_query($link, $query);
		while($row = mysqli_fetch_array($result)) {
		echo<<<EOT
<pre><p>Date: <span class="studydetails">{$row['date']} 
User: <span class="studydetails">{$row['userid']} 
<span class="studydetails">{$row['comment']}</span> </p>
</pre>						
EOT;
}
	?>
 
						</div>
					</div>
				</div>
				
			</div> <!--end container -->
		</div> <!-- end main -->
	<script type="text/javascript" src="../js/bins.js"> </script>	
	</body>
</html>