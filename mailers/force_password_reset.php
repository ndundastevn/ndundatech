<?php
/*
 *   Crafted On Mon Oct 14 2024
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


require_once('../config/config.php');
/* Mailer Configurations */
require_once('../vendor/PHPMailer/src/SMTP.php');
require_once('../vendor/PHPMailer/src/PHPMailer.php');
require_once('../vendor/PHPMailer/src/Exception.php');

$ret = "SELECT * FROM mailer_settings 
JOIN postfix_mailer_configs";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($mailer = $res->fetch_object()) {

    /* Determine which mailer is active */
    if ($mailer->mailer_status == 'Active') {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->setFrom($mailer->mailer_mail_from_email);
        $mail->addAddress($user_email);
        $mail->FromName = $mailer->mailer_mail_from_name;
        $mail->isHTML(true);
        $mail->IsSMTP();
        $mail->SMTPKeepAlive = true; //SMTP connection will not close after each email sent, reduces SMTP overhead
        $mail->SMTPSecure = $mailer->mailer_protocol;
        $mail->Host = $mailer->mailer_host;
        $mail->SMTPAuth = true;
        $mail->Port = $mailer->mailer_port;
        $mail->Username = $mailer->mailer_username;
        $mail->Password = $mailer->mailer_password;
        $mail->Subject = 'Password Reset';
        /* Custom Mail Body */
        $mail->Body = '
            <!doctype html>
            <html lang="en-US">
            
            <head>
                <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                <title>Password Reset</title>
                <meta name="description" content="Reset Password Email">
                <style type="text/css">
                    a:hover {text-decoration: underline !important;}
                </style>
            </head>
            
            <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
                <!--100% body table-->
                <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
                    style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
                    <tr>
                        <td>
                            <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                                align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="height:80px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="95%" border="0"  cellpadding="0" cellspacing="0"
                                            style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                            <tr>
                                                <td style="height:40px;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0 35px;" align="center">
                                                    <img src="https://agpo.makueni.go.ke/public/images/small-logo.jpg"  alt="logo">
                                                    <h4 style="color:#1e1e2d; font-weight:500; margin:0;font-size:39px;font-family:"Rubik",sans-serif;">
                                                        Government Of Makueni County<br> 
                                                    </h4>
                                                    <span
                                                        style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;" align="justify">
                                                        Greetings, <br>
                                                        You recently requested to reset the password for your ECDE MIS account.
                                                        Kindly use the default password below to login and change your password.
                                                    </p><br>
                                                    <p style="color:#455056; font-size:25px;line-height:24px; margin:0;" align="center">
                                                        <b>Makueni102</b>
                                                    </p>
                                                    <p align="center" style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                    <br>
                                                    Yours Sincerely<br>
                                                        <b>
                                                            Government of Makueni County <br>
                                                            <i>Wauni wa kwika nesa na ulungalu</i>
                                                        <br>
                                                    </b>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height:40px;">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                <tr>
                                    <td style="height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="height:80px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>
        ';
        /* Send this email here */
        $mail->send();
        /* ****************************************************************************************************** */
    } else if ($mailer->postfix_mailer_status == 'Active') {
        /* Load postfix mailer settings */
        $fromName = $mailer->postfix_mailer_from_name;
        $from = $mailer->postfix_mailer_from_email;
        $to = $user_email;
        $subject = "Password Reset";
        $message = ' 
        <!doctype html>
        <html lang="en-US">
        
            <head>
                <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                <title>Password Reset</title>
                <meta name="description" content="Reset Password Email">
                <style type="text/css">
                    a:hover {text-decoration: underline !important;}
                </style>
            </head>
            
            <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
                <!--100% body table-->
                <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
                    style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
                    <tr>
                        <td>
                            <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                                align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="height:80px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="95%" border="0"  cellpadding="0" cellspacing="0"
                                            style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                            <tr>
                                                <td style="height:40px;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                            <td style="padding:0 35px;" align="center">
                                                <img src="https://agpo.makueni.go.ke/public/images/small-logo.jpg"  alt="logo">
                                                <h4 style="color:#1e1e2d; font-weight:500; margin:0;font-size:39px;font-family:"Rubik",sans-serif;">
                                                    Government Of Makueni County<br> 
                                                </h4>
                                                <span
                                                style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                <p style="color:#455056; font-size:15px;line-height:24px; margin:0;" align="justify">
                                                    Greetings, <br>
                                                    You recently requested to reset the password for your ECDE MIS account.
                                                    Kindly use the default password below to login and change your password.
                                                </p><br>
                                                <p style="color:#455056; font-size:25px;line-height:24px; margin:0;" align="center">
                                                    <b>Makueni102</b>
                                                </p>
                                                <p align="center" style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                <br>
                                                Yours Sincerely<br>
                                                    <b>
                                                        Government of Makueni County <br>
                                                        <i>Wauni wa kwika nesa na ulungalu</i>
                                                    <br>
                                                </b>
                                                </p>
                                            </td>
                                            </tr>
                                            <tr>
                                                <td style="height:40px;">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                <tr>
                                    <td style="height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="height:80px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>
        </html>';
        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Additional headers 
        $headers .= 'From: ' . $fromName . '<' . $from . '>' . "\r\n";

        mail($to, $subject, $message, $headers);
    } else {
        /* Shhhh - Say nothing */
    }
}
