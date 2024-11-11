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
                        table {
                            font-size: 12px;
                            padding: 4px;
                        }

                        th {
                            text-align: left;
                            padding: 4pt;
                        }

                        td {
                            padding: 5pt;
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

                        .header {
                            margin-bottom: 20px;
                            width: 100%;
                            text-align: left;
                            position: absolute;
                            top: 0px;
                        }

                        .footer {
                            width: 100%;
                            text-align: center;
                            position: fixed;
                            bottom: -25px;
                        }

                        #no_border_table {
                            border: none;
                        }

                        #bold_row {
                            font-weight: bold;
                        }

                        #amount {
                            text-align: right;
                            font-weight: bold;
                        }

                        .pagenum:before {
                            content: counter(page);
                        }

                        /* Thick red border */
                        hr.red {
                            border: 1px solid red;
                        }
                        .list_header{
                            font-family: "Times New Roman", Times, serif;
                        }
                    </style>
                </head>

                <body style="margin:1px;">
                    <div class="footer">
                        <hr>
                        <i> This document has been generated by '.$user_names.'  On ' . date('d M Y g:ia') . '</i>
                    </div>
                    <div class="list_header" align="center">
                        <h3>
                            <img src="' . $base64 . '" style="width:65%" alt="Logo">  <br>
                            <hr style="width:100%" , color=black> <br>
                            ECDE MIS  <br>
                            '.$users['user_names'].' Authentication Logs From '. date('d M Y', strtotime($formated_from_date)).' To '.date('d M Y', strtotime($formated_to_date)).' <br>
                        </h3>                        
                    </div>
                    <table border="1" cellspacing="0" width="100%" style="font-size:9pt">
                        <thead>
                            <tr>
                                <th style="width:10%">S/N</th>
                                <th style="width:40%">IP Address</th>
                                <th style="width:150%">Device Details</th>
                                <th style="width:100%">Log Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            ';
                                $pdf_sql = mysqli_query(
                                    $mysqli,
                                    "SELECT * FROM logs 
                                    WHERE log_date BETWEEN '{$formated_from_date}' 
                                    AND '{$formated_to_date}' AND log_user_id = '{$log_user_id}'
                                    ORDER BY log_id DESC"
                                );
                                $cnt = 1;
                                if (mysqli_num_rows($pdf_sql) > 0) {
                                    while ($row = mysqli_fetch_array($pdf_sql)) {
                                        $html .=
                                            '
                                            <tr>
                                                <td>' . $cnt . '</td>
                                                <td>' . $row['log_ip_address'] . '</td>
                                                <td>' . $row['log_device'] . '</td>
                                                <td>' . date('d M Y g:ia', strtotime($row['log_date'])) . '</td>
                                            </tr>
                                        ';
                                        $cnt = $cnt + 1;
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
$dompdf->stream($users['user_names']. ' Authentication Logs From '.$formated_from_date.' To '.$formated_to_date, array("Attachment" => 1));
$options = $dompdf->getOptions();
$options->setDefaultFont('');
$dompdf->setOptions($options);