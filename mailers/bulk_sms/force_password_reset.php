<?php
/*
 *   Crafted On Sun Oct 13 2024
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


function sanitizePhoneNumber($phone)
{
    // 1. Remove any non-numeric characters
    $cleaned = preg_replace('/\D/', '', $phone);

    // 2. Handle cases where number starts with 07 or +254
    if (preg_match('/^07\d{8}$/', $cleaned)) {
        // Convert 07... to 2547...
        $cleaned = '254' . substr($cleaned, 1);
    } elseif (preg_match('/^254\d{9}$/', $cleaned)) {
        // Valid 254... format
        // No change needed
    } else {
        // If it doesn't match valid patterns, return false (invalid)
        return false;
    }

    // 3. Ensure the number has exactly 12 digits (valid international format)
    if (strlen($cleaned) !== 12) {
        return false;
    }

    return $cleaned;
}

function sendBulkSMS($sender_id, $api_key, $client_id, $numbers, $message, $isUnicode = true, $isFlash = false)
{
    // Initialize cURL session
    $curl = curl_init();

    // Prepare sanitized message parameters
    $messageParameters = [];
    foreach ($numbers as $number) {
        $sanitizedNumber = sanitizePhoneNumber($number);
        if ($sanitizedNumber) {
            $messageParameters[] = [
                "Number" => $sanitizedNumber,
                "Text" => $message
            ];
        } else {
            echo "Invalid number skipped: $number\n";
        }
    }

    // Check if there are valid numbers to send
    if (empty($messageParameters)) {
        echo "No valid phone numbers to send SMS.\n";
        return;
    }

    // Create payload dynamically
    $payload = json_encode([
        "SenderId" => $sender_id,
        "IsUnicode" => $isUnicode,
        "IsFlash" => $isFlash,
        "MessageParameters" => $messageParameters,
        "ApiKey" => $api_key,
        "ClientId" => $client_id
    ]);

    // Set cURL options
    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://api.digitalaggregators.com/v1/sms/SendBulkSMS',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json'
        ],
        CURLOPT_SSL_VERIFYPEER => false, // Disable SSL verification for testing
        CURLOPT_SSL_VERIFYHOST => false
    ]);

    // Execute the request and capture the response
    $response = curl_exec($curl);

    // Check for cURL errors - Enable this sucker for testing purposes
    /*  if (curl_errno($curl)) {
        echo 'cURL Error: ' . curl_error($curl);
    } else {
        echo 'Response: ' . $response;
    } */

    // Close the cURL session
    curl_close($curl);
}

/* Get Bulk SMS API Configurations */
$sms_configs = mysqli_query(
    $mysqli,
    "SELECT * FROM bulk_sms_api"
);
if (mysqli_num_rows($sms_configs) > 0) {
    while ($configs = mysqli_fetch_array($sms_configs)) {

        $sender_id = $configs['sms_sender_id'];
        $api_key = $configs['sms_api_client_key'];
        $client_id = $configs['sms_api_client_id'];
        $numbers = [$user_phone];
        $message =
            "Greetings, You recently requested to reset the password for your ECDE MIS account. Kindly use this default password to login and change your password. Default password: Makueni102";

        // Call the function to send SMS
        sendBulkSMS($sender_id, $api_key, $client_id, $numbers, $message);
    }
}
