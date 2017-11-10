						<!-- Modal for submitting new Study -->
						<li><a href="#myModalstudy" data-toggle="modal" data-backdrop="static">New Study</a></li>
							
							<div class="modal fade" id="myModalstudy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalstudy">New Study</h4>
										</div>
										<div class="modal-body">
											<!-- start add study form -->
											<form method="post" id="form1">
												<div class="form-group">
													<label for="name">Study ID</label>
													<input type="text" name="name" class="form-control" id="name" placeholder=""> <!-- formally exampleinputemail1 -->
												</div>
												<div class="form-group">
													<label for="description">Study Description</label>
													<input type="text" name="description" class="form-control" id="description" placeholder=""> <!-- formally exampleInputPassword1 -->
												</div>
												<div class="form-group">
													<label for="species">Species Name</label>
													<input type="text" name="species" class="form-control" id="species" placeholder="Crop"> 
												</div>
												<div class="form-group">
													<label for="worktype">Work Type</label>
													<input type="text" name="worktype" class="form-control" id="worktype" placeholder=""> 
												</div>
												<div class="form-group">
													<label for="collaborator">Collaborator</label>
													<input type="text" name="collaborator" class="form-control" id="collaborator" placeholder=""> 
												</div>
												<div class="form-group">
													<label for="targetdelivery">Target Delivery Date</label>
													<input type="date" name="targetdelivery" class="form-control" id="targetdelivery" placeholder=""> 
												</div>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<input type="submit" name="submit" class="btn btn-primary" value="Save Changes">
											</form> <!-- end add study form -->
										</div>
										<div class="modal-footer">
											<div id="success"> <?php echo $success; ?> </div>
											<div id="error"> <?php echo $error; $success; ?> </div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Modal -->