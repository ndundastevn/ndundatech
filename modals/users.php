<div class="modal fade" id="update_<?php echo $rows['user_id']; ?>">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update <?php echo $rows['user_names']; ?></h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Full names<span class="text-danger">*</span></label>
                            <input type="text" name="user_names" value="<?php echo $rows['user_names']; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email address<span class="text-danger">*</span></label>
                            <input type="email" name="user_email" value="<?php echo $rows['user_email']; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Contacts / Phone Number<span class="text-danger">*</span></label>
                            <input type="text" name="user_phone" value="<?php echo $rows['user_phone']; ?>" required class="form-control">
                            <input type="hidden" name="user_id" value="<?php echo $rows['user_id']; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>User group<span class="text-danger">*</span></label>
                            <select type="" name="user_access_level" required class="form-control">
                                <?php if ($rows['user_access_level'] == 'System Admnistrator') { ?>
                                    <option>System Administrator</option>
                                    <option>Executive</option>
                                    <option>ECDE Officer</option>
                                <?php } else if ($rows['user_access_level'] == 'Executive') { ?>
                                    <option>Executive</option>
                                    <option>ECDE Officer</option>
                                    <option>System Administrator</option>
                                <?php } else { ?>
                                    <option>ECDE Officer</option>
                                    <option>System Administrator</option>
                                    <option>Executive</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="text-right">
                        <button name="Update_User" class="btn btn-primary" type="submit">
                            <em class="icon ni ni-save"></em> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Change Password -->
<div class="modal fade" id="password_<?php echo $rows['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <img src='../public/images/merged_logos.png' height="80px">
                    <h4>Force Password Reset?</h4>
                    <p>
                        Are you sure you want to force <?php echo $rows['user_names']; ?>'s password reset?
                        The password reset subroutine will send an email to the user with a default password and
                        they will be required to change it on their next login.
                    </p>
                    <input type="hidden" name="user_id" value="<?php echo $rows['user_id']; ?>">
                    <input type="hidden" name="user_email" value="<?php echo $rows['user_email']; ?>">
                    <input type="hidden" name="user_phone" value="<?php echo $rows['user_phone']; ?>">
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No, </button>
                    <input type="submit" name="Change_Password" value="Yes, Force Reset" class="text-center btn btn-warning">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Disable Account Modal -->
<div class="modal fade" id="disable_<?php echo $rows['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="disableUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <img src='../public/images/merged_logos.png' height="80px">
                    <h4>Disable Account</h4>
                    <p>Are you sure you want to disable <?php echo $rows['user_names']; ?>'s account?</p>
                    <input type="hidden" name="user_id" value="<?php echo $rows['user_id']; ?>">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                    <input type="submit" name="Disable_User" value="Yes, Disable" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Activate Account Modal -->
<div class="modal fade" id="activate_<?php echo $rows['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="activateUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-success">
                    <img src='../public/images/merged_logos.png' height="80px">
                    <h4>Activate Account</h4>
                    <p>Are you sure you want to activate <?php echo $rows['user_names']; ?>'s account?</p>
                    <input type="hidden" name="user_id" value="<?php echo $rows['user_id']; ?>">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No, Cancel</button>
                    <input type="submit" name="Activate_User" value="Yes, Activate" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>