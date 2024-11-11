<?php
/*
 *   Crafted On Tue Oct 08 2024
 *   From his finger tips, through his IDE to your deployment environment at full throttle with no bugs, loss of data,
 *   fluctuations, signal interference, or doubt—it can only be
 *   the legendary coding wizard, Martin Mbithi (martin.mbithi@makueni.go.ke, www.martmbithi.github.io)
 * 
 *   www.makueni.go.ke
 *   info@makueni.go.ke
 *
 *
 *   The Government Of Makueni DevSecOps Band User License Agreement
 *   Copyright (c) 2023 Government of Makueni County
 *
 *
 *   1. LICENSE TO RULE
 *   Welcome to the elite club! Crafted by the ingenious Martin Mbithi, this software comes with the all-powerful,
 *   revocable, personal, non-exclusive, and non-transferable right to install and activate this masterpiece on ONE  
 *   lucky computer for your official, non-commercial escapades. Got a commercial itch? Better get that license first. 
 *   No peeking, sharing, or showing off this software to anyone else—strictly against the rules!
 *
 *   2. COPYRIGHT POWER
 *   This software, a creation of Martin Mbithi under the banner of the Government Of Makueni DevSecOps Band, is guarded by 
 *   copyright law and international treaties. So, don’t even think about messing with the proprietary notices, labels, 
 *   or marks—what’s his stays his!
 *
 *
 *   3. USE IT RIGHT OR LOSE IT
 *   You may not, and you may not let your fellow geeks:
 *   (a) hack, reverse engineer, decompile, decode, decrypt, disassemble, or attempt any sorcery to reveal the source code;
 *   (b) modify, remix, distribute, or create spinoffs of this masterpiece;
 *   (c) make copies (aside from your trusty backup), distribute, show off in public, transmit, sell, rent, lease, or otherwise
 *   exploit this software like it’s yours. Spoiler: it’s not!
 *
 *
 *   4. GAME OVER, MAN!
 *   This license is your golden ticket until one of us says otherwise. Want to end it? Smash the software and all its copies into
 *   digital dust. Break any rules? The license self-destructs, and you’ll need to nuke all copies—no second chances!
 *
 *
 *   5. NO PIXEL-PERFECT PROMISES
 *   Martin Mbithi and the Government Of Makueni DevSecOps Band don’t guarantee this software is glitch-free—think of it as a feature
 *   not a bug! We disclaim all other warranties, whether expressed or implied, including, but not limited to, implied warranties of merchantability
 *   fitness for a particular purpose, and non-infringement of third-party rights. Some jurisdictions have their own funky rules, so your mileage may
 *   vary. But remember: use at your own risk, brave user!
 *
 *
 *   6. KEEP THE PARTY GOING
 *   If a court zaps any part of this license, no worries—the rest of it keeps the party alive. One piece fails, but the agreement stands strong!
 *
 *
 *   7. NO DRAMA, NO DAMAGES
 *   Under no circumstances shall Martin Mbithi, the Government Of Makueni DevSecOps Band, or their minions be held responsible for any wild, indirect
 *   or accidental chaos from using this software—even if we warned you! And if you think you’ve got a claim, the most you’re getting is what you paid for the 
 *   license—if anything. Keep calm and code on!
 *
 */
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../helpers/users.php');
require_once('../partials/backoffice_head.php');
?>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <?php require_once('../partials/backoffice_sidebar.php'); ?>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php require_once('../partials/backoffice_header.php'); ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">System Users</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>
                                                    This module allows you to manage system users <br>
                                                </p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li>
                                                            <a href="#create_store" data-toggle="modal" class="btn btn-white btn-outline-light">
                                                                <em class="icon ni ni-user-add"></em>
                                                                <span>Add System User</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .toggle-wrap -->
                                        </div>
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->

                                <!-- Add Store Modal -->
                                <div class="modal fade" id="create_store">
                                    <div class="modal-dialog  modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Fill All Required Fields</h4>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" enctype="multipart/form-data">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Full names<span class="text-danger">*</span></label>
                                                            <input type="text" name="user_names" required class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Email address<span class="text-danger">*</span></label>
                                                            <input type="email" name="user_email" required class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Contacts / Phone Number<span class="text-danger">*</span></label>
                                                            <input type="text" name="user_phone" placeholder="0712345678" required class="form-control" pattern="07[0-9]{8}" title="Phone number must be in the format 0712345678">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Access Level<span class="text-danger">*</span></label>
                                                            <select name="user_access_level" required class="form-control"> <!-- Changed name attribute -->
                                                                <option value="">Select access level</option>
                                                                <option>System Administrator</option>
                                                                <option>Executive</option>
                                                                <option>ECDE Officer</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="text-right">
                                                        <button name="Add_User" class="btn btn-primary" type="submit">
                                                            <em class="icon ni ni-save"></em> Save
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="row">
                                        <div class="card mb-3 col-md-12 border border-success">
                                            <div class="card-body">
                                                <table class="datatable-init table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Names</th>
                                                            <th>Email</th>
                                                            <th>Contacts</th>
                                                            <th>User group</th>
                                                            <th>Manage</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $fetch_records_sql = mysqli_query(
                                                            $mysqli,
                                                            "SELECT * FROM users WHERE user_access_level != 'ECDE Teacher'"
                                                        );
                                                        if (mysqli_num_rows($fetch_records_sql) > 0) {
                                                            $cnt =  1;
                                                            while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $cnt; ?></td>
                                                                    <td>
                                                                        <?php echo $rows['user_names']; ?><br>
                                                                        <?php if ($rows['user_account_status'] == '1') { ?>
                                                                            <span class="badge badge-dim badge-pill badge-outline-danger">
                                                                                <em class="icon ni ni-user-cross-fill"></em> Disabled
                                                                            </span>
                                                                        <?php }  ?>
                                                                    </td>
                                                                    <td><?php echo $rows['user_email']; ?></td>
                                                                    <td><?php echo $rows['user_phone']; ?></td>
                                                                    <td><?php echo $rows['user_access_level']; ?></td>
                                                                    <td>
                                                                        <a data-toggle="modal" href="#update_<?php echo $rows['user_id']; ?>" class="badge badge-dim badge-pill badge-outline-secondary"><em class="icon ni ni-edit"></em> Edit</a>
                                                                        <a data-toggle="modal" href="#password_<?php echo $rows['user_id']; ?>" class="badge badge-dim badge-pill badge-outline-warning"><em class="icon ni ni-lock"></em> Reset password</a>
                                                                        <?php if ($rows['user_account_status'] == '0') { ?>
                                                                            <!-- Disable Account Button -->
                                                                            <a data-toggle="modal" href="#disable_<?php echo $rows['user_id']; ?>" class="badge badge-dim badge-pill badge-outline-danger">
                                                                                <em class="icon ni ni-user-cross-fill"></em> Disable account
                                                                            </a>
                                                                        <?php } else { ?>
                                                                            <!-- Activate Account Button -->
                                                                            <a data-toggle="modal" href="#activate_<?php echo $rows['user_id']; ?>" class="badge badge-dim badge-pill badge-outline-success">
                                                                                <em class="icon ni ni-user-check"></em> Activate account
                                                                            </a>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                                $cnt = $cnt + 1;
                                                                include('../modals/users.php');
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <?php require_once('../partials/backoffice_footer.php'); ?>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <?php require_once('../partials/backoffice_scripts.php'); ?>
</body>

</html>