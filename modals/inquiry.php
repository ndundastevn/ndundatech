<div class="modal fade" id="update_<?php echo $rows['inquiry_id']; ?>">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Enquiry from  <?php echo $rows['inquiry_name']; ?></h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Full names<span class="text-danger">*</span></label>
                            <input type="text" name="inquiry_names" value="<?php echo $rows['inquiry_name']; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email address<span class="text-danger">*</span></label>
                            <input type="email" name="inquiry_email" value="<?php echo $rows['inquiry_email']; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Contacts / Phone Number<span class="text-danger">*</span></label>
                            <input type="text" name="inquiry_phone" value="<?php echo $rows['inquiry_phone']; ?>" required class="form-control">
                            <input type="hidden" name="inquiry_id" value="<?php echo $rows['inquiry_id']; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Date<span class="text-danger">*</span></label>
                            <input type="text" name="created_at" value="<?php echo $rows['created_at']; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Subject<span class="text-danger">*</span></label>
                            <input type="text" name="inquiry_names" value="<?php echo $rows['inquiry_subject']; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Message<span class="text-danger">*</span></label>
                            <textarea type="text" name="inquiry_msg" class="form-control"><?php echo $rows['inquiry_name']; ?></textarea>
                        </div>
                        
                    </div>
                    <br><br>
                    <div class="text-right">
                        <!-- <button name="Update_User" class="btn btn-primary" type="submit">
                            <em class="icon ni ni-save"></em> Close
                        </button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Change Password -->
<div class="modal fade" id="password_<?php echo $rows['inquiry_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <img src='../public/images/merged_logos.png' height="80px">
                    <h4>Force Password Reset?</h4>
                    <p>
                        Are you sure you want to force <?php echo $rows['inquiry_names']; ?>'s password reset?
                        The password reset subroutine will send an email to the user with a default password and
                        they will be required to change it on their next login.
                    </p>
                    <input type="hidden" name="inquiry_id" value="<?php echo $rows['inquiry_id']; ?>">
                    <input type="hidden" name="inquiry_email" value="<?php echo $rows['inquiry_email']; ?>">
                    <input type="hidden" name="inquiry_phone" value="<?php echo $rows['inquiry_phone']; ?>">
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No, </button>
                    <input type="submit" name="Change_Password" value="Yes, Force Reset" class="text-center btn btn-warning">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Disable Account Modal -->
<div class="modal fade" id="disable_<?php echo $rows['inquiry_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="disableUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <img src='../public/images/merged_logos.png' height="80px">
                    <h4>Disable Account</h4>
                    <p>Are you sure you want to disable <?php echo $rows['inquiry_names']; ?>'s account?</p>
                    <input type="hidden" name="inquiry_id" value="<?php echo $rows['inquiry_id']; ?>">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                    <input type="submit" name="Disable_User" value="Yes, Disable" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Activate Account Modal -->
<div class="modal fade" id="activate_<?php echo $rows['inquiry_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="activateUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-success">
                    <img src='../public/images/merged_logos.png' height="80px">
                    <h4>Activate Account</h4>
                    <p>Are you sure you want to activate <?php echo $rows['inquiry_names']; ?>'s account?</p>
                    <input type="hidden" name="inquiry_id" value="<?php echo $rows['inquiry_id']; ?>">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No, Cancel</button>
                    <input type="submit" name="Activate_User" value="Yes, Activate" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>