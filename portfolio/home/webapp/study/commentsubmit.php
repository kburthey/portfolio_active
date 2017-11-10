<?php 

	if (array_key_exists("commentsubmit", $_POST)) {
		$link = mysqli_connect("shareddb1d.hosting.stackcp.net", "comments-3231e2ee", "3uVeWBKgXZ1w", "comments-3231e2ee");
		if (mysqli_connect_error()) {
			die("Database Connection Error");
		}
		if (!$_POST['comment']) {
			$error .= "Comment field empty<br>";
		}
		if ($error != "") {
			$error = "<p> There was an error submitting the comment form: </p>".$error;
		} else { 
			$link = mysqli_connect("shareddb1d.hosting.stackcp.net", "comments-3231e2ee", "3uVeWBKgXZ1w", "comments-3231e2ee");
			$query = "insert into comments (studyid, userid, comment, date) values ('".mysqli_real_escape_string($link, $_GET['study'])."', '$activeuser', '".mysqli_real_escape_string($link, $_POST['comment'])."', NOW())";
			if (!mysqli_query($link, $query)) {
				$error .= "<p> Could not enter comment, try again</p>";
			} else {
				$success .= "<p> study entered successfully</p>";
				echo "<meta http-equiv='refresh' content='0'>"; 
				}
			}
		}
	
	
	if (array_key_exists("follow", $_POST)) {
		$link = mysqli_connect("shareddb1c.hosting.stackcp.net", "followers-3230c3c5", "w7HZdskR3UgS", "followers-3230c3c5");
		if (mysqli_connect_error()) {
			die("Database Connection Error");
		} else {
			$query = "Select userid from followers where studyid = '".mysqli_real_escape_string($link, $_GET['study'])."' limit 1";
			$result = mysqli_query($link, $query);
			if (mysqli_num_rows($result) >0) {
				$error = "You already follow this study";
			}else {
				$query = "insert into followers (studyid, userid, follower) values ('".mysqli_real_escape_string($link, $_GET['study'])."', '$activeuser', '".mysqli_real_escape_string($link, $_POST['follow'])."')";
				if (!mysqli_query($link, $query)) {
						$error .= "<p> Could not complete, try again</p>";
					} else {
						$success .= "<p> followed successfully</p>";
						echo "<meta http-equiv='refresh' content='0'>"; 
					}
				}
			}
		}
		
	
	if (array_key_exists("editdetails1", $_POST)) {
		$link = mysqli_connect("shareddb1c.hosting.stackcp.net", "studies-3230eff2", "F9icYbNvKEky", "studies-3230eff2");
		if (mysqli_connect_error()) {
			die("Database Connection Error");
		}
		if (!$_POST['targetdelivery']) {
			$error .= "select new delivery date<br>";
		}
		if (!$_POST['status']) {
			$error .= "select new status<br>";
		}
		if ($error != "") {
			$error = "<p> There was an error submitting the form: </p>".$error;
		} else { 
			$link = mysqli_connect("shareddb1c.hosting.stackcp.net", "studies-3230eff2", "F9icYbNvKEky", "studies-3230eff2");
			$query = "update studies set targetdelivery = '".mysqli_real_escape_string($link, $_POST['targetdelivery'])."',
				status = '".mysqli_real_escape_string($link, $_POST['status'])."' where name = '".$_GET['study']."' ";
			if (!mysqli_query($link, $query)) {
				$error .= "<p> Could not update, try again</p>";
			} else {
				$success .= "<p> update entered successfully</p>";
				echo "<meta http-equiv='refresh' content='0'>"; 
				}
			}
		}	
	
			?>