<?php
/*
 *   Crafted On Wed Oct 23 2024
 *   From his finger tips, through his IDE to your deployment environment at full throttle with no bugs, loss of data,
 *   fluctuations, signal interference, or doubt—it can only be
 *   the legendary coding wizard, Martin Mbithi (martin@devlan.co.ke, www.martmbithi.github.io)
 *   
 *   www.devlan.co.ke
 *   hello@devlan.co.ke
 *
 *
 *   The Devlan Solutions LTD Super Duper User License Agreement
 *   Copyright (c) 2022 Devlan Solutions LTD
 *
 *
 *   1. LICENSE TO BE AWESOME
 *   Congrats, you lucky human! Devlan Solutions LTD hereby bestows upon you the magical,
 *   revocable, personal, non-exclusive, and totally non-transferable right to install this epic system
 *   on not one, but TWO separate computers for your personal, non-commercial shenanigans.
 *   Unless, of course, you've leveled up with a commercial license from Devlan Solutions LTD.
 *   Sharing this software with others or letting them even peek at it? Nope, that's a big no-no.
 *   And don't even think about putting this on a network or letting a crowd join the fun unless you
 *   first scored a multi-user license from us. Sharing is caring, but rules are rules!
 *
 *   2. COPYRIGHT POWER-UP
 *   This Software is the prized possession of Devlan Solutions LTD and is shielded by copyright law
 *   and the forces of international copyright treaties. You better not try to hide or mess with
 *   any of our awesome proprietary notices, labels, or marks. Respect the swag!
 *
 *
 *   3. RESTRICTIONS, NO CHEAT CODES ALLOWED
 *   You may not, and you shall not let anyone else:
 *   (a) reverse engineer, decompile, decode, decrypt, disassemble, or do any sneaky stuff to
 *   figure out the source code of this software;
 *   (b) modify, remix, distribute, or create your own funky version of this masterpiece;
 *   (c) copy (except for that one precious backup), distribute, show off in public, transmit, sell, rent,
 *   lease, or otherwise exploit the Software like it's your own.
 *
 *
 *   4. THE ENDGAME
 *   This License lasts until one of us says 'Game Over'. You can call it quits anytime by
 *   destroying the Software and all the copies you made (no hiding them under your bed).
 *   If you break any of these sacred rules, this License self-destructs, and you must obliterate
 *   every copy of the Software, no questions asked.
 *
 *
 *   5. NO GUARANTEES, JUST PIXELS
 *   DEVLAN SOLUTIONS LTD doesn’t guarantee this Software is flawless—it might have a few
 *   quirks, but who doesn’t? DEVLAN SOLUTIONS LTD washes its hands of any other warranties,
 *   implied or otherwise. That means no promises of perfect performance, marketability, or
 *   non-infringement. Some places have different rules, so you might have extra rights, but don’t
 *   count on us for backup if things go sideways. Use at your own risk, brave adventurer!
 *
 *
 *   6. SEVERABILITY—KEEP THE GOOD STUFF
 *   If any part of this License gets tossed out by a judge, don’t worry—the rest of the agreement
 *   still stands like a boss. Just because one piece fails doesn’t mean the whole thing crumbles.
 *
 *
 *   7. NO DAMAGE, NO DRAMA
 *   Under no circumstances will Devlan Solutions LTD or its squad be held responsible for any wild,
 *   indirect, or accidental chaos that might come from using this software—even if we warned you!
 *   And if you ever think you’ve got a claim, the most you’re getting out of us is the license fee you
 *   paid—if any. No drama, no big payouts, just pixels and code.
 *
 */

include('../config/config.php');
require '../vendor/autoload.php';  // Include PHPSpreadsheet library

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * Helper function to sanitize sheet names.
 * - Replace invalid characters with underscores.
 * - Trim name to 31 characters (Excel limit).
 */
function sanitizeSheetName($name) {
    // Replace invalid characters with underscores
    $sanitized = preg_replace('/[\/\\\?*\[\]:]/', '_', $name);
    // Trim to 31 characters
    return mb_substr($sanitized, 0, 31);
}

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();

// Fetch all wards from the database
$fetch_wards_sql = mysqli_query($mysqli, "SELECT * FROM ward");
if (mysqli_num_rows($fetch_wards_sql) > 0) {
    $sheetIndex = 0;

    while ($wards = mysqli_fetch_array($fetch_wards_sql)) {
        // Create a new sheet for each ward
        if ($sheetIndex > 0) {
            $spreadsheet->createSheet();
        }
        $spreadsheet->setActiveSheetIndex($sheetIndex);

        // Sanitize the ward name to use as the sheet title
        $wardName = sanitizeSheetName($wards['ward_name']);
        $spreadsheet->getActiveSheet()->setTitle($wardName);

        // Set header row
        $fields = ['Center ID', 'Center Name'];
        $spreadsheet->getActiveSheet()->fromArray($fields, NULL, 'A1');

        // Fetch centers for the current ward
        $query = $mysqli->query("SELECT * FROM ecde_centers WHERE center_ward_id = '{$wards['ward_id']}'");

        if ($query->num_rows > 0) {
            $rowIndex = 2;  // Start inserting from row 2

            while ($row = $query->fetch_assoc()) {
                $lineData = [
                    //$rowIndex - 1,  // Serial number
                    $row['center_id'],
                    $row['center_name']
                ];
                $spreadsheet->getActiveSheet()->fromArray($lineData, NULL, "A$rowIndex");
                $rowIndex++;
            }
        } else {
            // If no centers available, add a message
            $spreadsheet->getActiveSheet()->setCellValue('A2', 'No Centers Available...');
        }

        $sheetIndex++;  // Increment sheet index for the next ward
    }

    // Set the first sheet as active by default
    $spreadsheet->setActiveSheetIndex(0);

    // Generate Excel file for download
    $fileName = "ECDE_Centers_Across_All_Wards.xlsx";
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=\"$fileName\"");

    // Write the Excel file and output it to the browser
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
} else {
    echo "No wards found in the database.";
}

