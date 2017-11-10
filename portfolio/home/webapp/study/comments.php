						<div class="panel-heading"><h4><i class="fa fa-comments" aria-hidden="true"></i> Comments
						
							<a href="#commentmodal" data-toggle="modal" data-backdrop="static">Add Comment</a></h4>
							<!-- Modal for submitting comment information -->
							<div class="modal fade" id="commentmodal" tabindex="-1" role="dialog" aria-labelledby="commentmodal">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="commentemodal">Start</h4>
										</div>
										<div class="modal-body">
											<!-- start comment form -->
											<form method="post" id="comment1">
												
												<div class="form-group">
													<label for="comment">Comment</label>
													<textarea type="text" name="comment" class="form-control" id="comment"></textarea>
												</div>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<input type="submit" name="commentsubmit" class="btn btn-primary" value="Save Changes">
											</form> <!-- end comment form -->
										</div>
										<div class="modal-footer">
											<div id="success"> <?php echo $success; ?> </div>
											<div id="error"> <?php echo $error; ?> </div>
											
										</div>
									</div>
								</div>
							</div>
							<!-- End Modal -->
						</div> <!-- end panel head -->