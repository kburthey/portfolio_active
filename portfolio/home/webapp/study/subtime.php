<?php

	if (array_key_exists("startsubmit", $_POST)) {
		$link = mysqli_connect("shareddb1c.hosting.stackcp.net", "studies-3230eff2", "F9icYbNvKEky", "studies-3230eff2");
		if (mysqli_connect_error()) {
			die("Database Connection Error");
		}
		if (!$_POST['analyst']) {
			$error .= "analyst is required<br>";
		}
		/*if (!$_POST['SOW']) {
			$error .= "Please select SOW option<br>";
		}*/
		if (!$_POST['targetclose']) {
			$error .= "Target close date missing<br>";
		}
		if ($error != "") {
			$error = "<p> There were error(s) in your form: </p>".$error;
		} else { 
			$link = mysqli_connect("shareddb1c.hosting.stackcp.net", "studies-3230eff2", "F9icYbNvKEky", "studies-3230eff2");	
			$query = "update studies set primaryanalyst = '".mysqli_real_escape_string($link, $_POST['analyst'])."',
				targetclose = '".mysqli_real_escape_string($link, $_POST['targetclose'])."',
				startnote =  '".mysqli_real_escape_string($link, $_POST['startnotes'])."' where name = '".$_GET['study']."'";
			if (!mysqli_query($link, $query)) {
				$error = "<p> Could not enter start info, try again</p>";
			} else {
				$success .= "<p>success</p>";
				echo "<meta http-equiv='refresh' content='0'>";
				}
			}
		}
		
		
	if (array_key_exists("deliversubmit", $_POST)) {
		$link = mysqli_connect("shareddb1c.hosting.stackcp.net", "studies-3230eff2", "F9icYbNvKEky", "studies-3230eff2");
		if (mysqli_connect_error()) {
			die("Database Connection Error");
		}
		if (!$_POST['ddm']) {
			$error .= "Delivery Meeting Date is required<br>";
		}
		if (!$_POST['colabnote']) {
			$error .= "Collaborator Notified incomplete<br>";
		}/*
		if (!$_POST['dan']) {
			$error .= "Downstream Analyst incomplete<br>";
		}*/
		if ($error != "") {
			$error = "<p> There were error(s) in your form: </p>".$error;
		} else { 
			$link = mysqli_connect("shareddb1c.hosting.stackcp.net", "studies-3230eff2", "F9icYbNvKEky", "studies-3230eff2");	
			$query = "update studies set deliverymeeting = '".mysqli_real_escape_string($link, $_POST['ddm'])."',
				collabnotified = '".mysqli_real_escape_string($link, $_POST['colabnote'])."',
				deliverynote =  '".mysqli_real_escape_string($link, $_POST['deliverynotes'])."' where name = '".$_GET['study']."'";
			if (!mysqli_query($link, $query)) {
				$error = "<p> Could not enter delivery info, try again</p>";
			} else {
				$success .= "<p>success</p>";
				echo "<meta http-equiv='refresh' content='0'>";
				}
			}
		}
		
	if (array_key_exists("closesubmit", $_POST)) {
		$link = mysqli_connect("shareddb1c.hosting.stackcp.net", "studies-3230eff2", "F9icYbNvKEky", "studies-3230eff2");
		if (mysqli_connect_error()) {
			die("Database Connection Error");
		}
		if (!$_POST['closedate']) {
			$error .= "Close Date is required<br>";
		}/*
		if (!$_POST['resultarchive']) {
			$error .= "Results in Archive incomplete<br>";
		}*/
		if (!$_POST['location']) {
			$error .= "Location of Results incomplete<br>";
		}
		if ($error != "") {
			$error = "<p> There were error(s) in your form: </p>".$error;
		} else { 
			$link = mysqli_connect("shareddb1c.hosting.stackcp.net", "studies-3230eff2", "F9icYbNvKEky", "studies-3230eff2");	
			$query = "update studies set status = '2',
				closedate = '".mysqli_real_escape_string($link, $_POST['closedate'])."',
				resultlocation = '".mysqli_real_escape_string($link, $_POST['location'])."' where name = '".$_GET['study']."'";
			if (!mysqli_query($link, $query)) {
				$error = "<p> Could not enter start info, try again</p>";
			} else {
				$success .= "<p>success</p>";
				echo "<meta http-equiv='refresh' content='0'>";
				}
			}
		}

?>