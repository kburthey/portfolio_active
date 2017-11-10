<?php 
	session_start();
	$error = "";
	$success = "";
	$currentsearch = "";
	if (array_key_exists("logout", $_GET)) {
		unset($_SESSION['id']);
		unset($_COOKIE['id']);
		setcookie("id", "", time()-3600);
	} else if (array_key_exists("id", $_SESSION)) {
		$activeuser = $_SESSION['id'];
	} else if (array_key_exists("id", $_COOKIE)) {
		$activeuser = $_COOKIE['id'];
		$_SESSION['id'] = $_COOKIE['id'];
	} else {
		header("Location: ../");
	}
	
	if (array_key_exists("submit", $_POST)) {
		$link = mysqli_connect("shareddb1c.hosting.stackcp.net", "studies-3230eff2", "F9icYbNvKEky", "studies-3230eff2");
		if (mysqli_connect_error()) {
			die("Database Connection Error");
		}
		if (!$_POST['name']) {
			$error .= "A study ID is required<br>";
		}
		if (!$_POST['description']) {
			$error .= "A description is required<br>";
		}
		if (!$_POST['species']) {
			$error .= "A species/crop is required. If unknown, enter N/A<br>";
		}
		if (!$_POST['worktype']) {
			$error .= "A worktype is required. If unknown, enter TBD<br>";
		}
		if (!$_POST['collaborator']) {
			$error .= "Please enter a collaborator<br>";
		}
		if (!$_POST['targetdelivery']) {
			$error .= "Please select a target delivery date";
		}		
		if ($error != "") {
			$error = "<p> There were error(s) in your form: </p>".$error;
		} else { 
				$query = "SELECT id from studies where name = '".mysqli_real_escape_string($link, $_POST['name'])."' limit 1";
				$result = mysqli_query($link, $query);
				if (mysqli_num_rows($result) > 0 ) {
					$error = "That study name has already been entered.";
					echo "<script type='text/javascript'>alert('$error');</script>";
				} else {
					$query = "insert into studies (name, description, species, worktype, collaborator, targetdelivery) values ('".mysqli_real_escape_string($link, $_POST['name'])."', '".mysqli_real_escape_string($link, $_POST['description'])."', '".mysqli_real_escape_string($link, $_POST['species'])."', '".mysqli_real_escape_string($link, $_POST['worktype'])."', '".mysqli_real_escape_string($link, $_POST['collaborator'])."', '".mysqli_real_escape_string($link, $_POST['targetdelivery'])."  ')";
					if (!mysqli_query($link, $query)) {
						$error = "<p> Could not enter study info, try again</p>";
					} else {
						$success .= "<p> study entered successfully</p>";
						header("Location: ../");
						}
				}
			}
		}

		
	if (array_key_exists("clearsearch", $_POST)) {
		unset($_SESSION['searchinput']);
		unset($_SESSION['filter']);
		echo "<meta http-equiv='refresh' content='0'>"; 
		}
	if (isset($_SESSION['searchinput']) && isset($_SESSION['filter'])) {
		$currentsearch = "Current filter = ".$_SESSION['filter']." contains: ".$_SESSION['searchinput'];
		}
	
	if (isset($_POST['searchsubmit'])) {
		$search = $_POST['searchinput'];
		$filter = $_POST['filter'];
		$link = mysqli_connect("shareddb1c.hosting.stackcp.net", "studies-3230eff2", "F9icYbNvKEky", "studies-3230eff2");
		if (mysqli_connect_error()) {
			die("Database Connection Error");
		}
		if (!$_POST['searchinput']) {
			$error .= "argument is required<br>";
		}
		if (!$_POST['filter']) {
			$error .= "Please select a filter<br>";
		}
		if ($error != "") {
			$error = "<p> There were error(s) in your form: </p>".$error;
		} else {
			$_SESSION['searchinput'] = $search;
			$_SESSION['filter'] = $filter;
			echo "<meta http-equiv='refresh' content='0'>";
		}
	}
		?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> KiGen | Active </title>
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
						<?php include('../newstudy.php'); ?>						
							
						<li><a href="#">Active Studies</a></li>
						<li><a href="../adduser/">Add KRS Users</a></li>
						<li><a href="../viewuser/">View KRS Users</a></li>
						<li><a href="../closed/">Closed</a></li>
					</ul> <!-- end menu list -->
				</div> <!-- end nav -->
			</div> <!-- end container -->
		</div> <!-- end menu -->
		<div class="main">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-4">
						<h1><i class="fa fa-list-alt" aria-hidden="true"></i> Active Studies </h1>
					</div>
					<div class="col-sm-12 col-md-8" style="text-align: left; padding-top: 20px;">
						<form method="post" id="search" class="form-inline">

							<div class="form-group">
								<label for="filter">Filter:</label>
								<input list="searchlist" name="filter" class="form-control" id="filter" placeholder="select filter">
								<datalist id="searchlist">
									<option value="Name">
									<option value="Description">
									<option value="Species">
									<option value="WorkType">
									<option value="Collaborator">
									<option value="primaryanalyst">
									<option value="Users">
									<option value="Followers">
								</datalist>
							</div>
							<div class="form-group">
								<input type="text" name="searchinput" class="form-control" id="searchinput" placeholder="search">
							</div>
							<div class="form-group">
								<input type="submit" name="searchsubmit" class="btn btn-primary" value='Search'>
							</div>
							<div class="form-group">
								<input type="submit" name="clearsearch" class="btn btn-secondary" value='Clear'>
							</div>
						</form> <!-- end close form -->
						<p style="text-align:right"> <?php echo $error; echo $currentsearch; ?> </p>
					</div>
				</div>
					<!-- Display active study Panel -->
					<?php 
					$link = mysqli_connect("shareddb1c.hosting.stackcp.net", "studies-3230eff2", "F9icYbNvKEky", "studies-3230eff2");
						if (mysqli_connect_error()) {
							die("Database Connection Error");
						} else {
							if (!isset($_SESSION['searchinput'])) {
							$query = "select * from studies";
							$result = mysqli_query($link, $query);
							while($row = mysqli_fetch_array($result)) {
								if ($row['status'] == '1') {
									$progress = 'progress-bar-warning';
									$status = 'on-hold';
								} elseif ($row['status'] == '2') {
									$progress = 'progress-bar';
									$status = 'closed';
								} elseif ($row['status'] == '3') {
									$progress = 'progress-bar-danger';
									$status = 'terminated';
								} else {
									$progress = 'progress-bar-success';
									$status = 'active';
									}
								if ($row['status'] == '1' || $row['status'] == '4') {
								echo<<<EOT
								<a href="../study/?study={$row['Name']}"> 
									<div class="panel panel-default panelactive">
										<div class="panel-body" data-toggle="modal" data-target="#{$row['Name']}" data-backdrop="static">
											<div class="row line">
												<div class="col-sm-8">
													<p>Study ID: <span class="studydetails">{$row['Name']}</span></p>
													<p>Study Description: {$row['Description']}</p>
													<p>Crop: {$row['Species']} </p>
												</div>
												<div class="col-sm-3">
													<p>Target Due Date: {$row['TargetDelivery']}</p>
													<p>Work Type: {$row['WorkType']}</p>
													<p>Collaborator: {$row['Collaborator']}</p>
												</div>
											</div>
										</div> <!-- end panel body -->
										<div class="progress">
											<div class="{$progress}" role="progress-bar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
												<p style="text-align: center"><span class="studydetails">{$status}</span> </p>
											</div>
										</div> <!-- end progress -->
									</div> <!-- end panel default-->
								</a> <!-- end link to panel -->
EOT;
							}
						}
					} elseif (isset($_SESSION['searchinput'])) {			
						$link = mysqli_connect("shareddb1c.hosting.stackcp.net", "studies-3230eff2", "F9icYbNvKEky", "studies-3230eff2");
						$query = "select * from studies where '".mysqli_real_escape_string($link, $_SESSION['filter'])."' like '".mysqli_real_escape_string($link, $_SESSION['searchinput'])."%' ";
						if (!mysqli_query($link, $query)) {
							$error = " Could not search, try again";
						} else {
							$link = mysqli_connect("shareddb1c.hosting.stackcp.net", "studies-3230eff2", "F9icYbNvKEky", "studies-3230eff2");
							$query = "select * from studies where ".mysqli_real_escape_string($link, $_SESSION['filter'])." like '%".mysqli_real_escape_string($link, $_SESSION['searchinput'])."%' ";
							$result = mysqli_query($link, $query);
							while ($row = mysqli_fetch_array($result)) {
							if ($row['status'] == '1') {
								$progress = 'progress-bar-warning';
								$status = 'on-hold';
							} elseif ($row['status'] == '2') {
								$progress = 'progress-bar';
								$status = 'closed';
							} elseif ($row['status'] == '3') {
								$progress = 'progress-bar-danger';
								$status = 'terminated';
							} else {
								$progress = 'progress-bar-success';
								$status = 'active';
								}
							if ($row['status'] == '1' || $row['status'] == '0') {
							echo<<<EOT
								<a href="../study/?study={$row['Name']}">
									<div class="panel panel-default panelactive">
										<div class="panel-body" data-toggle="modal" data-target="#{$row['Name']}" data-backdrop="static">
											<div class="row line">
												<div class="col-sm-8">
													<p>Study ID: <span class="studydetails">{$row['Name']}</span></p>
													<p>Study Description: {$row['Description']}</p>
													<p>Crop: {$row['Species']} </p>
												</div>
												<div class="col-sm-3">
													<p>Taget Due Date: {$row['TargetDelivery']}</p>
													<p>Work Type: {$row['WorkType']}</p>
													<p>Collaborator: {$row['Collaborator']}</p>
												</div>
											</div>
										</div> <!-- end panel body -->
										<div class="progress">
											<div class="{$progress}" role="progress-bar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
												<p style="text-align: center"><span class="studydetails">{$status}</span> </p>
											</div>
										</div> <!-- end progress -->
									</div> <!-- end panel default -->
								</a> <!-- end panel link -->
EOT;
							}
						}
					}
				}
			}
									?>
				
			</div>	<!-- end container -->
		</div> <!-- end main -->
	<script type="text/javascript" src="../js/bins.js">	</script>
	</body>
</html>