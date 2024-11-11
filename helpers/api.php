<?php
/*
 *   Crafted On Thu Oct 17 2024
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

/* STMP */
if (isset($_POST['STMP'])) {
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $mailer_host = mysqli_real_escape_string($mysqli, $_POST['mailer_host']);
    $mailer_port = mysqli_real_escape_string($mysqli, $_POST['mailer_port']);
    $mailer_protocol = mysqli_real_escape_string($mysqli, $_POST['mailer_protocol']);
    $mailer_username = mysqli_real_escape_string($mysqli, $_POST['mailer_username']);
    $mailer_mail_from_name = mysqli_real_escape_string($mysqli, $_POST['mailer_mail_from_name']);
    $mailer_mail_from_email = mysqli_real_escape_string($mysqli, $_POST['mailer_mail_from_email']);
    $mailer_password = mysqli_real_escape_string($mysqli, $_POST['mailer_password']);
    $mailer_status = mysqli_real_escape_string($mysqli, $_POST['mailer_status']);

    if ($mailer_status == 'Active') {
        /* Before fine tuning this sucker, check if postfix still active */
        $fetch_records_sql = mysqli_query(
            $mysqli,
            "SELECT * FROM postfix_mailer_configs"
        );
        if (mysqli_num_rows($fetch_records_sql) > 0) {
            while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                $postfix_mailer_status = $rows['postfix_mailer_status'];
                if ($postfix_mailer_status == 'Active') {
                    $err = "Please disable the postfix mailer before activating the STMP mailer";
                } else {
                    /* Fine Tune */
                    $tune_sql = "UPDATE mailer_settings SET mailer_host  = '{$mailer_host}', mailer_port = '{$mailer_port}', 
                    mailer_protocol = '{$mailer_protocol}', mailer_username = '{$mailer_username}', mailer_mail_from_name = '{$mailer_mail_from_name}',
                    mailer_mail_from_email = '{$mailer_mail_from_email}', mailer_password = '{$mailer_password}', mailer_status = '{$mailer_status}' WHERE id = '{$id}'";

                    if (mysqli_query($mysqli, $tune_sql)) {
                        $success = "STMP settings updated";
                    } else {
                        $err  = "Failed, please try again";
                    }
                }
            }
        }
    } else {
        /* Fine tune stmp mailer silently */
        $tune_sql = "UPDATE mailer_settings SET mailer_host  = '{$mailer_host}', mailer_port = '{$mailer_port}', 
        mailer_protocol = '{$mailer_protocol}', mailer_username = '{$mailer_username}', mailer_mail_from_name = '{$mailer_mail_from_name}',
        mailer_mail_from_email = '{$mailer_mail_from_email}', mailer_password = '{$mailer_password}', mailer_status = '{$mailer_status}' WHERE id = '{$id}'";

        if (mysqli_query($mysqli, $tune_sql)) {
            $success = "STMP settings updated";
        } else {
            $err  = "Failed, please try again";
        }
    }
}
/* postfix */
if (isset($_POST['POSTFIX'])) {
    $postfix_mailer_from_name = mysqli_real_escape_string($mysqli, $_POST['postfix_mailer_from_name']);
    $postfix_mailer_from_email = mysqli_real_escape_string($mysqli, $_POST['postfix_mailer_from_email']);
    $postfix_mailer_status = mysqli_real_escape_string($mysqli, $_POST['postfix_mailer_status']);

    if ($postfix_mailer_status == 'Active') {
        /* Determine If the stmp mailer is set to active, only one mailer must be active */
        $fetch_records_sql = mysqli_query(
            $mysqli,
            "SELECT * FROM mailer_settings"
        );
        if (mysqli_num_rows($fetch_records_sql) > 0) {
            while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                $mailer_status = $rows['mailer_status'];
                if ($mailer_status == 'Active') {
                    $err = "Please disable the STMP mailer before activating the postfix mailer";
                } else {
                    /* Fine Tune */
                    $tune_sql = "UPDATE postfix_mailer_configs SET postfix_mailer_from_name = '{$postfix_mailer_from_name}', postfix_mailer_from_email = '{$postfix_mailer_from_email}',  
                    postfix_mailer_status = '{$postfix_mailer_status}'";

                    if (mysqli_query($mysqli, $tune_sql)) {
                        $success = "Postfix mailer settings updated";
                    } else {
                        $err = "Failed, please try again";
                    }
                }
            }
        }
    } else {
        /* Fine tune postfix silently */
        $tune_sql = "UPDATE postfix_mailer_configs SET postfix_mailer_from_name = '{$postfix_mailer_from_name}', postfix_mailer_from_email = '{$postfix_mailer_from_email}',  
        postfix_mailer_status = '{$postfix_mailer_status}'";

        if (mysqli_query($mysqli, $tune_sql)) {
            $success = "Postfix mailer settings updated";
        } else {
            $err = "Failed, please try again";
        }
    }
}

/* Bulk SMS */
if (isset($_POST['Bulk_SMS'])) {
    $sms_api_id = mysqli_real_escape_string($mysqli, $_POST['sms_api_id']);
    $sms_api_provider = mysqli_real_escape_string($mysqli, $_POST['sms_api_provider']);
    $sms_api_client_id  = mysqli_real_escape_string($mysqli, $_POST['sms_api_client_id']);
    $sms_api_client_key = mysqli_real_escape_string($mysqli, $_POST['sms_api_client_key']);
    $sms_sender_id = mysqli_real_escape_string($mysqli, $_POST['sms_sender_id']);

    /* Update SMS API */
    if (
        mysqli_query(
            $mysqli,
            "UPDATE bulk_sms_api SET sms_api_provider = '{$sms_api_provider}', sms_sender_id = '{$sms_sender_id}', sms_api_client_id = '{$sms_api_client_id}', sms_api_client_key = '{$sms_api_client_key}'
            WHERE sms_api_id = '{$sms_api_id}'"
        )
    ) {
        $success = "SMS API Configurations Saved";
    } else {
        $err = "Failed, please try again";
    }
}
