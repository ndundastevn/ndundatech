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
require_once('../config/app_config.php');
require_once('../config/codeGen.php');
require_once('../helpers/auth.php');
require_once('../partials/backoffice_head.php');

?>

<body class="nk-body npc-crypto ui-clean pg-auth">
    <!-- app body @s -->
    <div class="nk-app-root">
        <div class="nk-split nk-split-page nk-split-md">
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container w-lg-45">
                <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                    <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                </div>
                <div class="nk-block nk-block-middle nk-auth-body">
                    <div class="brand-logo pb-5 text-center">
                        <a href="#" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" src="../public/images/merged_logos.png" srcset="../public/images/merged_logos.png 2x" alt="logo">
                            <img class="logo-dark logo-img logo-img-lg" src="../public/images/merged_logos.png" srcset="../public/images/merged_logos.png 2x" alt="logo-dark">
                        </a>
                    </div>
                    <div class="nk-block-head text-center">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Government of Makueni County ECDE Management System</h5>
                            <div class="nk-block-des">
                                <p>
                                   Forgot your password? Worry not, just enter your staff email and we will email you reset instructions.
                                </p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <hr>
                    <form method="post">

                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" required name="user_email" placeholder="staff@makueni.go.ke" class="form-control form-control-lg" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block" name="Reset_Password_Step_1">Reset Password</button>
                        </div>
                    </form><!-- form -->
                    <div class="form-note-s2 pt-4 text-center">
                        Remembered password ? <br><a href="login"><strong> Login</strong></a>
                    </div>
                </div><!-- .nk-block -->
            </div><!-- nk-split-content -->
            <div style="background-image: url('https://makueni.go.ke/sandbox/site/files/2024/07/ECDE-Teachers-absorbed-as-permanent-and-pensionable.-l-edited-2.jpg'); background-repeat: no-repeat;  background-position: center;   background-size: cover;" class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">

            </div><!-- nk-split-content -->
        </div><!-- nk-split -->
    </div><!-- app body @e -->
    <!-- JavaScript -->
    <?php require_once('../partials/backoffice_scripts.php'); ?>
</body>

</html>