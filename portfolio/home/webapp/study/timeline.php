				
				<!-- start timeline section -->
				<div class="row timeline">
					<div class="col-sm-4">
						
						<h3><a href="#startmodal" data-toggle="modal" data-backdrop="static">Start</a></h3>
							<!-- Modal for submitting start information -->
							<div class="modal fade" id="startmodal" tabindex="-1" role="dialog" aria-labelledby="startmodal">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="startmodal">Start</h4>
										</div>
										<div class="modal-body">
											<!-- start  form -->
											<form method="post" id="start1">
												<div class="form-group">
													<label for="analyst">Analyst</label>
													<input type="text" name="analyst" class="form-control" id="analyst" placeholder=""> 
												</div>
												<!--<div class="form-group">
													<label for="SOW">SOW Sent</label>
													<input list="SOWlist" name="SOW" class="form-control" id="SOW" placeholder="">
													<datalist id="SOWlist">
														<option value="Yes">
														<option value="No">
														<option value="N/A">
													</datalist>
												</div> -->
												<div class="form-group">
													<label for="targetclose">Target Close Date</label>
													<input type="date" name="targetclose" class="form-control" id="targetclose" placeholder=""> 
												</div>
												<div class="form-group">
													<label for="startnotes">Notes/Description</label>
													<input type="text" name="startnotes" class="form-control" id="startnotes">
												</div>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<input type="submit" name="startsubmit" class="btn btn-primary" value="Save Changes">
											</form> <!-- end start form -->
										</div>
										<div class="modal-footer">
											<div id="success"> <?php echo $success; ?> </div>
											<div id="error"> <?php echo $error; ?> </div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Modal -->
						 
						<div id="start">
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
									echo<<<EOT
							<ul>
								<li>Analyst: <span class="studydetails"> {$row['primaryanalyst']} </span>	</li>
								<li>Target Close Date:<span class="studydetails"> {$row['targetclose']}	</span></li>
								<li>Notes:<span class="studydetails"> {$row['startnote']}</span></li>
							</ul>
EOT;
		}
	}
	?>
						</div> <!-- end start -->
					</div>
					<div class="col-sm-4">
						
						<h3><a href="#deliverymodal" data-toggle="modal" data-backdrop="static">Delivery</a></h3>
							<!-- Modal for submitting delivery information -->
							<div class="modal fade" id="deliverymodal" tabindex="-1" role="dialog" aria-labelledby="deliverymodal">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="deliverymodal">Delivery</h4>
										</div>
										<div class="modal-body">
											<!-- start delivery form -->
											<form method="post" id="deliver1">
												<div class="form-group">
													<label for="ddm">Delivery Meeting Date</label>
													<input type="date" name="ddm" class="form-control" id="ddm" placeholder=""> 
												</div>
												<div class="form-group">
													<label for="colabnote">Collaborator Notified</label>
													<input list="notifylist" name="colabnote" class="form-control" id="colabnote" placeholder="">
													<datalist id="notifylist">
														<option value="Yes">
														<option value="No">
													</datalist>
												</div>
												<!-- <div class="form-group">
													<label for="dan">Downstream Analyst Notified</label>
													<input list="downstreamlist" name="dan" class="form-control" id="dan" placeholder="">
													<datalist id="downstreamlist">
														<option value="Yes">
														<option value="No">
													</datalist>
												</div> -->
												<div class="form-group">
													<label for="deliverynotes">Notes/Description</label>
													<input type="text" name="deliverynotes" class="form-control" id="deliverynotes">
												</div>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<input type="submit" name="deliversubmit" class="btn btn-primary" value="Save Changes">
											</form> <!-- end deliver form -->
										</div>
										<div class="modal-footer">
											<div id="success"> <?php echo $success; ?> </div>
											<div id="error"> <?php echo $error; ?> </div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Modal -->
							
						<div id="delivery">
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
									echo<<<EOT
							<ul>
								<li>Delivery Date: <span class="studydetails"> {$row['deliverymeeting']} </span>	</li>
								<li>Collaborator Notified:<span class="studydetails"> {$row['collabnotified']}</span>	</li>
								<li>Notes:<span class="studydetails"> {$row['deliverynote']}</span></li>
							</ul>
EOT;
		}
	}
	?>
				
						</div><!-- end delivery -->
					</div>
					<div class="col-sm-4">
						
						<h3><a href="#closemodal" data-toggle="modal" data-backdrop="static">Close</a></h3>
							<!-- Modal for submitting close information -->
							<div class="modal fade" id="closemodal" tabindex="-1" role="dialog" aria-labelledby="closemodal">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="closemodal">Close</h4>
										</div>
										<div class="modal-body">
											<!-- start close form -->
											<form method="post" id="close1">
												<div class="form-group">
													<label for="closedate">Close Date</label>
													<input type="date" name="closedate" class="form-control" id="closedate" placeholder=""> 
												</div>
												<!-- <div class="form-group">
													<label for="resultarchive">Results in Archive?</label>
													<input list="results" name="resultarchive" class="form-control" id="resultarchive" placeholder="">
													<datalist id="results">
														<option value="Yes">
														<option value="No">
													</datalist>
												</div> -->
												<div class="form-group">
													<label for="location">Location of Results</label>
													<input type="text" name="location" class="form-control" id="location">
												</div>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<input type="submit" name="closesubmit" class="btn btn-primary" value="Save Changes">
											</form> <!-- end close form -->
										</div>
										<div class="modal-footer">
											<div id="success"> <?php echo $success; ?> </div>
											<div id="error"> <?php echo $error; ?> </div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Modal -->
						
						<div id="close">
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
									echo<<<EOT
							<ul>
								<li>Close Date: <span class="studydetails"> {$row['closedate']} </span>	</li>
								<li>Location of Results:<span class="studydetails"> {$row['resultlocation']}	</span></li>
								
							</ul>
EOT;
		}
	}
	?>						
						</div> <!-- end close -->
					</div>
				</div>	<!-- end timeline section -->