<?php
/*
 *   Crafted On Wed Oct 16 2024
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
require_once('../vendor/autoload.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$html =
    '
        <!DOCTYPE html>
            <html>
                <head>
                    <meta name="" content="XYZ,0,0,1" />
                    <style type="text/css">
                        body {
                            position: relative;
                            margin: 0;
                            padding: 0;
                        }

                        table {
                            font-size: 12px;
                            padding: 4px;
                            border-collapse: collapse; /* Merge borders */
                            width: 100%;
                        }

                        th {
                            text-align: left;
                            padding: 4pt;
                            background-color: #f2f2f2; /* Header background color */
                        }

                        td {
                            padding: 5pt;
                        }

                        /* Alternating row shading */
                        .alt_row {
                            background-color: #f9f9f9; /* Light grey for alternate rows */
                        }

                        #b_border {
                            border-bottom: dashed thin;
                        }

                        legend {
                            color: #0b77b7;
                            font-size: 1.2em;
                        }

                        #error_msg {
                            text-align: left;
                            font-size: 11px;
                            color: red;
                        }

                        .footer {
                            width: 100%;
                            text-align: center;
                            position: fixed;
                            bottom: -25px;
                        }

                        .list_header {
                            font-family: "Times New Roman", Times, serif;
                            text-align: center;
                        }
                    </style>
                </head>

                <body>
                    <div class="footer">
                        <hr>
                        <i>This document has been generated by ' . $user_names . ' On ' . date('d M Y g:ia') . '</i>
                    </div>
                    <div class="list_header">
                        <h3>
                            <img src="' . $base64 . '" style="width:65%" alt="Logo">  <br>
                            <hr style="width:100%; color=black"> <br>
                            ' . $center . ' ECDE Enrollments<br>
                        </h3>                        
                    </div>
                    <table border="1" cellspacing="0" style="font-size:9pt">
                        <thead>
                            <tr>
                                <th style="width:10%">S/N</th>
                                <th style="width:100%">Pupils Name</th>
                                <th style="width:70%">Date of Birth</th>
                                <th style="width:50%">Gender</th>
                                <th style="width:50%">ADM Number</th>
                                <th style="width:80%">Date of Admission</th>
                                <th style="width:100%">Parent / Guardian Name</th>
                                <th style="width:80%">Contacts</th>
                                <th style="width:50%">Level</th>
                                <th style="width:100%">Special Need</th>
                            </tr>
                        </thead>
                        <tbody>
                            ';
                                $pdf_sql = mysqli_query(
                                    $mysqli,
                                    "SELECT * FROM pupils 
                                    WHERE pupil_center_id  = '{$id}'
                                    ORDER BY pupil_name ASC"
                                );
                                $cnt = 1;
                                if (mysqli_num_rows($pdf_sql) > 0) {
                                    while ($row = mysqli_fetch_array($pdf_sql)) {
                                        if ($row['pupil_is_special'] == '0') {
                                            $pwd_mainstreaming =  "N/A";
                                        } else {
                                            $pwd_mainstreaming =  "Yes <br>". $row['pupil_special_need_details'];
                                        }

                                        $html .=
                                            '
                                            <tr>
                                                <td>' . $cnt . '</td>
                                                <td>' . $row['pupil_name'] . '</td>
                                                <td>' . $row['pupil_dob'] . '</td>
                                                <td>' . $row['pupil_gender'] . '</td>
                                                <td>' . $row['pupil_admission_number'] . '</td>
                                                <td>' . $row['pupil_date_of_admission'] . '</td>
                                                <td>' . $row['pupil_parent_names'] . '</td>
                                                <td>' . $row['pupil_parent_contacts'] . '</td>
                                                <td>' . $row['pupil_academic_level'] . '</td>
                                                <td>' . $pwd_mainstreaming . '</td>
                                            </tr>
                                       ';
                                        $cnt++;
                                    }
                                }
                                $html .= '
                        </tbody>
                    </table>
                </body>
            </html>
    ';

$dompdf = new Dompdf();
$dompdf->load_html($html);
$dompdf->set_paper('A4', 'landscape');
$dompdf->set_option('isHtml5ParserEnabled', true);
$dompdf->render();
$dompdf->stream($center . ' Enrollments', array("Attachment" => 1));
$options = $dompdf->getOptions();
$options->setDefaultFont('');
$dompdf->setOptions($options);
