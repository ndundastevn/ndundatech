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
                            <label>Personal Number<span class="text-danger">*</span></label>
                            <input type="text" name="user_personal_number" value="<?php echo $rows['user_personal_number']; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Contacts / Phone Number<span class="text-danger">*</span></label>
                            <input type="text" name="user_phone" value="<?php echo $rows['user_phone']; ?>" required class="form-control">
                            <input type="hidden" name="user_id" value="<?php echo $rows['user_id']; ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Teacher Category<span class="text-danger">*</span></label>
                            <select type="" name="user_employment_category" required class="form-control">
                                <?php if ($rows['user_employment_category'] == 'CET') { ?>
                                    <option>CET</option>
                                    <option>PET</option>
                                    <option>PRIVATE</option>
                                <?php } elseif ($rows['user_employment_category'] == 'PRIVATE') { ?>
                                    <option>PRIVATE</option>
                                    <option>PET</option>
                                    <option>CET</option>
                                <?php } else { ?>
                                    <option>PET</option>
                                    <option>PRIVATE</option>
                                    <option>CET</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Gender<span class="text-danger">*</span></label>
                            <select name="user_gender" required class="form-control">
                                <?php if ($rows['user_gender'] == 'Male') { ?>
                                    <option>Male</option>
                                    <option>Female</option>
                                <?php } else { ?>
                                    <option>Female</option>
                                    <option>Male</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>ECDE Center<span class="text-danger">*</span></label>
                            <select type="" name="user_ecde_center_id" required class="form-select" data-search="on">
                                <option value="<?php echo $rows['user_ecde_center_id']; ?>"><?php echo $rows['center_name']; ?></option>
                                <?php
                                $fetch_centers_sql = mysqli_query(
                                    $mysqli,
                                    "SELECT * FROM ecde_centers WHERE center_id != '{$rows['center_id']}' ORDER BY center_name ASC"
                                );
                                if (mysqli_num_rows($fetch_centers_sql) > 0) {
                                    while ($centers = mysqli_fetch_array($fetch_centers_sql)) {
                                ?>
                                        <option value="<?php echo $centers['center_id']; ?>"><?php echo $centers['center_name']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="text-right">
                        <button name="Update_Teacher" class="btn btn-primary" type="submit">
                            <em class="icon ni ni-save"></em> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>