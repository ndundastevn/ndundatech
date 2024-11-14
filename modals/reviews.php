<!-- review modal -->
<div class="modal fade fixed-right" id="submitReview" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header align-items-center">
				<div class="text-center">
					<h6 class="mb-0 text-bold">Submit A Review</h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
					<div class="row">
						<div class="form-group col-sm-12 col-lg-6 col-xl-6">
							<label class="form-control-label">Your Name<span class="text-danger">*</span></label>
							<div class="input-group input-group-merge">
								<input type="text" required name="review_owner" class="form-control">
							</div>
						</div>
						<div class="form-group col-sm-12 col-lg-6 col-xl-6">
							<label class="form-control-label">Your Email <span class="text-danger">*</span></label>
							<div class="input-group input-group-merge">
								<input type="email" required name="review_email" class="form-control">
							</div>
						</div>

						<div class="form-group col-sm-12 col-lg-12 col-xl-12 mt-2">
							<label class="form-control-label">Review Message <span class="text-danger">*</span></label>
							<div class="input-group input-group-merge">
								<textarea required name="review_msg" class="form-control"></textarea>
							</div>
						</div>
						<!-- 
								<div class="form-group col-sm-12 col-lg-12 col-xl-12">
									<label class="form-control-label">Access level <span class="text-danger">*</span></label>
									<div class="input-group input-group-merge">
										<select type="text" required name="user_access_level" class="form-control">
											<option value="">Select</option>
											<option value="System Administrator">System Administrator</option>
											<option value="Agent">Landlord/Agent</option>
											<option value="Tenant">Tenant</option>
										</select>
									</div>
								</div> -->
					</div>
					<div class="text-right mt-2">
						<button type="submit" name="submitReview" class="btn btn-outline-success">Submit Review</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- ./end review modal -->

<!-- Edit review modal -->
<div class="modal fade fixed-right" id="editReview_<?php echo $rows['review_id']; ?>" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header align-items-center">
				<div class="text-center">
					<h6 class="mb-0 text-bold">Edit Review</h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
					<div class="row">
						<div class="form-group col-sm-12 col-lg-6 col-xl-6">
							<label class="form-control-label">Your Name<span class="text-danger">*</span></label>
							<div class="input-group input-group-merge">
								<input type="text" hidden name="review_id" value="<?php echo $rows['review_id']; ?>" class="form-control">
								<input type="text" required name="review_owner" value="<?php echo $rows['review_owner']; ?>" class="form-control">
							</div>
						</div>
						<div class="form-group col-sm-12 col-lg-6 col-xl-6">
							<label class="form-control-label">Your Email <span class="text-danger">*</span></label>
							<div class="input-group input-group-merge">
								<input type="email" required name="review_email" value="<?php echo $rows['review_email']; ?>" class="form-control">
							</div>
						</div>

						<div class="form-group col-sm-12 col-lg-12 col-xl-12 mt-2">
							<label class="form-control-label">Review Message <span class="text-danger">*</span></label>
							<div class="input-group input-group-merge">
								<textarea required name="review_msg" class="form-control"><?php echo $rows['review_msg']; ?></textarea>
							</div>
						</div>
						
					</div>
					<div class="text-right mt-2">
						<button type="submit" name="Update" class="btn btn-outline-success">Edit Review</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- ./end review modal -->


<!-- published  -->
<div class="modal fade" id="published_<?php echo $rows['review_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deactivateModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deactivateModalLabel">Publish</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
					<input type="hidden" name="review_id" value="<?php echo $rows['review_id']; ?>">
					<p>Are you sure you want to publish this review</p>
					<button type="submit" name="publish" class="btn btn-warning">Reset</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- unpublished  -->
<div class="modal fade" id="unpublished_<?php echo $rows['review_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deactivateModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deactivateModalLabel">Unpublish</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
					<input type="hidden" name="review_id" value="<?php echo $rows['review_id']; ?>">
					<p>Are you sure you want to unpublish this review</p>
					<button type="submit" name="unpublish" class="btn btn-warning">Unpublish</button>
				</form>
			</div>
		</div>
	</div>
</div>
