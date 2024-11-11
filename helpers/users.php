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


/* Add System User */
if (isset($_POST['Add_User'])) {
    $user_names = mysqli_real_escape_string($mysqli, $_POST['user_names']);
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $user_phone = mysqli_real_escape_string($mysqli, $_POST['user_phone']);
    $user_access_level = mysqli_real_escape_string($mysqli, $_POST['user_access_level']); // Ensure correct name attribute in the form
    $generated_password = 'Makueni102'; // System-generated password
    $hashed_password = sha1(md5($generated_password)); // Hash the password before saving

    $check_user_sql = "SELECT * FROM users WHERE user_email = '{$user_email}' OR user_phone = '{$user_phone}'";
    $check_res = mysqli_query($mysqli, $check_user_sql);

    if (mysqli_num_rows($check_res) > 0) {
        $err = "Email or phone number already exists";
    } else {
        $insert_user_sql = "INSERT INTO users (user_names, user_email, user_phone, user_password, user_access_level, user_change_password) 
        VALUES ('{$user_names}', '{$user_email}', '{$user_phone}', '{$hashed_password}', '{$user_access_level}', '1')";

        if (mysqli_query($mysqli, $insert_user_sql)) {
            include('../mailers/staff_welcome.php');
            include('../mailers/bulk_sms/staff_welcome.php');

            // Set success message
            $success = 'User added successfully. An email has been sent with the password.';
        } else {
            $err = "Failed to create account, please try again later";
        }
    }
}

/* Update System User */
if (isset($_POST['Update_User'])) {
    $user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']);
    $user_names = mysqli_real_escape_string($mysqli, $_POST['user_names']);
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $user_phone = mysqli_real_escape_string($mysqli, $_POST['user_phone']);
    $user_access_level = mysqli_real_escape_string($mysqli, $_POST['user_access_level']);

    /* Update */
    if (
        mysqli_query(
            $mysqli,
            "UPDATE users SET user_names = '{$user_names}', user_email = '{$user_email}', user_phone = '{$user_phone}', user_access_level = '{$user_access_level}'
            WHERE user_id = '{$user_id}'"
        )
    ) {
        $success = "$user_names Account updated successfully";
    } else {
        $err = 'Failed, please try again';
    }
}


/* Change Passwords */
if (isset($_POST['Change_Password'])) {
    $user_id  = mysqli_real_escape_string($mysqli, $_POST['user_id']);
    $user_phone = mysqli_real_escape_string($mysqli, $_POST['user_phone']);
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $user_access_level = mysqli_real_escape_string($mysqli, $_POST['user_access_level']);
    $user_password = 'Makueni102';
    $enc_password = sha1(md5($user_password));

    /* Persist */
    if (mysqli_query(
        $mysqli,
        "UPDATE users SET user_password = '{$enc_password}', user_change_password = '1' WHERE user_id = '{$user_id}'"
    )) {
        /* Notify  */
        include('../mailers/force_password_reset.php');
        include('../mailers/bulk_sms/force_password_reset.php');

        $success = "Password reset";
    } else {
        $err = "Failed, please try again";
    }
}

/* Disable / Enable System User Account */
if (isset($_POST['Disable_User'])) {
    $user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']);

    if (mysqli_query(
        $mysqli,
        "UPDATE users SET user_account_status = '1' WHERE user_id = '{$user_id}'"
    )) {
        $success = "User account disabled";
    } else {
        $err = "Failed, please try again";
    }
}

/* Enable User Account */
if (isset($_POST['Activate_User'])) {
    $user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']);

    if (mysqli_query(
        $mysqli,
        "UPDATE users SET user_account_status = '0' WHERE user_id = '{$user_id}'"
    )) {
        $success = "User account activated";
    } else {
        $err = "Failed, please try again";
    }
}



/* ECDE CENTERS */
if (isset($_POST['Add_ECDE_Teacher'])) {
    $user_names = mysqli_real_escape_string($mysqli, $_POST['user_names']);
    $user_personal_number = mysqli_real_escape_string($mysqli, $_POST['user_personal_number']);
    $user_password = sha1(md5(mysqli_real_escape_string($mysqli, 'Makueni102')));
    $user_phone = mysqli_real_escape_string($mysqli, $_POST['user_phone']);
    $user_access_level = 'ECDE Teacher';
    $user_ecde_center_id = mysqli_real_escape_string($mysqli, $_POST['user_ecde_center_id']);
    $user_employment_category = mysqli_real_escape_string($mysqli, $_POST['user_employment_category']);
    $user_gender = mysqli_real_escape_string($mysqli, $_POST['user_gender']);

    /* Check Duplicates */
    $check_user_sql = "SELECT * FROM users WHERE user_personal_number = '{$user_personal_number}' OR user_phone = '{$user_phone}'";
    $check_res = mysqli_query($mysqli, $check_user_sql);

    if (mysqli_num_rows($check_res) > 0) {
        $err = "Personal Number or  phone number already exists";
    } else {
        /* Persist */
        if (mysqli_query(
            $mysqli,
            "INSERT INTO users (user_names, user_personal_number, user_password, user_phone, user_access_level, user_ecde_center_id, user_employment_category, user_gender)
            VALUES('{$user_names}', '{$user_personal_number}', '{$user_password}', '{$user_phone}', '{$user_access_level}', '{$user_ecde_center_id}', '{$user_employment_category}', '{$user_gender}')"
        )) {
            $success = "ECDE teacher account registered successfully";
        } else {
            $err = "Failed, please try again";
        }
    }
}

/* Update Users */
if (isset($_POST['Update_Teacher'])) {
    $user_names = mysqli_real_escape_string($mysqli, $_POST['user_names']);
    $user_personal_number = mysqli_real_escape_string($mysqli, $_POST['user_personal_number']);
    $user_phone = mysqli_real_escape_string($mysqli, $_POST['user_phone']);
    $user_ecde_center_id = mysqli_real_escape_string($mysqli, $_POST['user_ecde_center_id']);
    $user_employment_category = mysqli_real_escape_string($mysqli, $_POST['user_employment_category']);
    $user_gender = mysqli_real_escape_string($mysqli, $_POST['user_gender']);
    $user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']);


    /* Update Staff */
    if (mysqli_query(
        $mysqli,
        "UPDATE users SET user_names = '{$user_names}', user_personal_number = '{$user_personal_number}', user_phone = '{$user_phone}', user_ecde_center_id = '{$user_ecde_center_id}',
        user_employment_category = '{$user_employment_category}', user_gender = '{$user_gender}' WHERE user_id = '{$user_id}'"
    )) {
        $success = "Updated successfully";
    } else {
        $err = "Failed, please try again";
    }
}


/* Change Personal User Password */
if (isset($_POST['Change_User_Password'])) {
    $user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

    /* Persist */
    if ($new_password != $confirm_password) {
        $err = "Passwords does not match!";
    } else {
        if (mysqli_query(
            $mysqli,
            "UPDATE users SET user_password = '{$confirm_password}' WHERE user_id = '{$user_id}'"
        )) {
            $success = "Passwords updated";
        } else {
            $err = "Failed, please try again";
        }
    }
}
