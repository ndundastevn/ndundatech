<?php
/*
 *   Crafted On Tue Oct 15 2024
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
require_once('../vendor/autoload.php');


/* Convert logo to a base 64 image */

$path = '../public/images/letter_head.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);


/* Konstant Variables */
$user_names = mysqli_real_escape_string($mysqli, $_SESSION['user_names']);

/* Export_Dashboard_Level_One_Pupils */
if (isset($_POST['Export_Dashboard_Level_One_Pupils'])) {
    include('../reports/pdf/dashboard_level_one_pupils.php');
}


/* Export_Dashboard_Level_Two_Pupils  */
if (isset($_POST['Export_Dashboard_Level_Two_Pupils'])) {
    $subcounty = mysqli_real_escape_string($mysqli, $_POST['subcounty']);
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);

    include('../reports/pdf/dashboard_level_two_pupils.php');
}


/* Export_Dashboard_Level_Three_Pupils */
if (isset($_POST['Export_Dashboard_Level_Three_Pupils'])) {
    $ward = mysqli_real_escape_string($mysqli, $_POST['ward']);
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);

    include('../reports/pdf/dashboard_level_three_pupils.php');
}


/* Export_Dashboard_Level_Four_Pupils */
if (isset($_POST['Export_Dashboard_Level_Four_Pupils'])) {
    $center = mysqli_real_escape_string($mysqli, $_POST['center']);
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);

    include('../reports/pdf/dashboard_level_four_pupils.php');
}


/* Export_Dashboard_Level_One_Teachers */
if (isset($_POST['Export_Dashboard_Level_One_Teachers'])) {
    include('../reports/pdf/dashboard_level_one_teachers.php');
}


/* Export_Dashboard_Level_Two_Teachers */
if (isset($_POST['Export_Dashboard_Level_Two_Teachers'])) {
    $subcounty = mysqli_real_escape_string($mysqli, $_POST['subcounty']);
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);

    include('../reports/pdf/dashboard_level_two_teachers.php');
}


/* Export_Dashboard_Level_Three_Teachers */
if (isset($_POST['Export_Dashboard_Level_Three_Teachers'])) {
    $ward = mysqli_real_escape_string($mysqli, $_POST['ward']);
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);

    include('../reports/pdf/dashboard_level_three_teachers.php');
}


/* Export_Dashboard_Level_One_Centers */
if (isset($_POST['Export_Dashboard_Level_One_Centers'])) {
    include('../reports/pdf/dashboard_level_one_centers.php');
}


/* Export_Dashboard_Level_Two_Centers */
if (isset($_POST['Export_Dashboard_Level_Two_Centers'])) {
    $subcounty = mysqli_real_escape_string($mysqli, $_POST['subcounty']);
    $id = mysqli_real_escape_string($mysqli,  $_POST['id']);

    require_once('../reports/pdf/dashboard_level_two_centers.php');
}


/* Export_Dashboard_Level_Three_Center */
if (isset($_POST['Export_Dashboard_Level_Three_Center'])) {
    $ward = mysqli_real_escape_string($mysqli, $_POST['ward']);
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);

    include('../reports/pdf/dashboard_level_three_centers.php');
}


/* Export_Logs */
if (isset($_POST['Export_Logs'])) {
    $log_user_id = mysqli_real_escape_string($mysqli, $_POST['log_user_id']);
    $logs_from_date = mysqli_real_escape_string($mysqli, $_POST['logs_from_date']);
    $logs_to_date = mysqli_real_escape_string($mysqli, $_POST['logs_to_date']);
    /* Convert dates  */
    $formated_from_date = date('Y-m-d', strtotime($logs_from_date));
    $formated_to_date = date('Y-m-d', strtotime($logs_to_date));

    if ($log_user_id == 'All_Users') {
        include('../reports/pdf/export_logs_all.php');
    } else {
        $users_sql = mysqli_query($mysqli, "SELECT * FROM users 
        WHERE user_id = '{$log_user_id}'
        ORDER BY user_names ASC");
        if (mysqli_num_rows($users_sql) > 0) {
            while ($users = mysqli_fetch_array($users_sql)) {
                include('../reports/pdf/export_logs.php');
            }
        }
    }
}


/* Export_Asset_Register */
if (isset($_POST['Export_Asset_Register'])) {
    $asset_category = mysqli_real_escape_string($mysqli, $_POST['asset_category']);
    $asset_status = mysqli_real_escape_string($mysqli, $_POST['asset_status']);
    $asset_center_id = mysqli_real_escape_string($mysqli, $_POST['asset_center_id']);

    /* Limit Down To Center Level */
    $fetch_centers_sql = mysqli_query(
        $mysqli,
        "SELECT * FROM ecde_centers WHERE center_id = '{$asset_center_id}'"
    );
    if (mysqli_num_rows($fetch_centers_sql) > 0) {
        while ($centers = mysqli_fetch_array($fetch_centers_sql)) {
            /* Include Report Generator */
            include('../reports/pdf/export_asset_register.php');
        }
    }
}
