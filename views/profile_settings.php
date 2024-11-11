<?php
/*
 *   Crafted On Thu Oct 10 2024
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
                <?php
                $fetch_records_sql = mysqli_query(
                    $mysqli,
                    "SELECT * FROM users WHERE user_id = '{$_SESSION['user_id']}'"
                );
                if (mysqli_num_rows($fetch_records_sql) > 0) {
                    while ($user = mysqli_fetch_array($fetch_records_sql)) {
                ?>
                        <!-- content @s -->
                        <div class="nk-content ">
                            <div class="container-fluid">
                                <div class="nk-content-inner">
                                    <div class="nk-content-body">
                                        <div class="nk-block-head nk-block-head-sm">
                                            <div class="nk-block-between">
                                                <div class="nk-block-head-content">
                                                    <h3 class="nk-block-title page-title"><?php echo $user['user_names']; ?></h3>
                                                    <div class="nk-block-des text-soft">
                                                        <p>
                                                            This module allows you to manage your profile settings <br>
                                                        </p>
                                                    </div>
                                                </div><!-- .nk-block-head-content -->
                                            </div><!-- .nk-block-between -->
                                        </div><!-- .nk-block-head -->
                                        <!-- Add Store Modal -->
                                        <div class="">
                                            <div class="row">
                                                <div class="card mb-3 col-md-12 border border-success">
                                                    <div class="card-body">
                                                        <ul class="nav nav-tabs nav-tabs-s2">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab" href="#tabItem9">Personal Details</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#tabItem10">Login Details</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="tabItem9">
                                                                <form method="post" enctype="multipart/form-data">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label>Full names<span class="text-danger">*</span></label>
                                                                            <input type="text" name="user_names" value="<?php echo $user['user_names']; ?>" required class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label>Email address<span class="text-danger">*</span></label>
                                                                            <input type="email" readonly name="user_email" value="<?php echo $user['user_email']; ?>" required class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label>Contacts / Phone Number<span class="text-danger">*</span></label>
                                                                            <input type="text" name="user_phone" value="<?php echo $user['user_phone']; ?>" required class="form-control">
                                                                            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>" required class="form-control">
                                                                            <input type="hidden" name="user_access_level" value="<?php echo $user['user_access_level']; ?>" required class="form-control">
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
                                                            <div class="tab-pane" id="tabItem10">
                                                                <form method="post" enctype="multipart/form-data">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label>New Password<span class="text-danger">*</span></label>
                                                                            <input type="password" name="new_password" required class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label>Confirm Password<span class="text-danger">*</span></label>
                                                                            <input type="password" name="confirm_password" required class="form-control">
                                                                            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>" required class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <br><br>
                                                                    <div class="text-right">
                                                                        <button name="Change_User_Password" class="btn btn-primary" type="submit">
                                                                            <em class="icon ni ni-save"></em> Save
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block -->
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
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