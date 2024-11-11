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
require_once('../functions/analytics.php');
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
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">
                                                <?php echo $greeting . ', ' . $_SESSION['user_names']; ?>!
                                            </h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Welcome to Government of Makueni County ECDE Database.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <!-- All Pupils -->
                                        <div class="col-md-4">
                                            <a href="dashboard_level_1_pupils">
                                                <div class="card card-bordered card-full">
                                                    <div class="card-inner">
                                                        <div class="card-title-group align-start mb-0">
                                                            <div class="card-title">
                                                                <h6 class="subtitle">ECDE Pupils</h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-amount">
                                                            <span class="amount">
                                                                <?php echo number_format($all_pupils); ?> <br>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <!-- Teachers -->
                                        <div class="col-md-4">
                                            <a href="dashboard_level_1_teachers">
                                                <div class="card card-bordered card-full">
                                                    <div class="card-inner">
                                                        <div class="card-title-group align-start mb-0">
                                                            <div class="card-title">
                                                                <h6 class="subtitle">ECDE Teachers</h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-amount">
                                                            <span class="amount">
                                                                <?php echo number_format($all_teachers); ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <!-- ECDE Centers -->
                                        <div class="col-md-4">
                                            <a href="dashboard_level_1_ecde_centers">
                                                <div class="card card-bordered card-full">
                                                    <div class="card-inner">
                                                        <div class="card-title-group align-start mb-0">
                                                            <div class="card-title">
                                                                <h6 class="subtitle">ECDE Centers</h6>
                                                            </div>
                                                        </div>
                                                        <div class="card-amount">
                                                            <span class="amount">
                                                                <?php echo number_format($all_centers); ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-xxl-4 col-sm-12">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">Pupils Gender Mainstreaming</h6>
                                                        </div>
                                                    </div>
                                                    <div class="traffic-channel">
                                                        <div class="traffic-channel-doughnut-ck">
                                                            <canvas class="analytics-doughnut" id="GenderMainstreaming"></canvas>
                                                        </div>

                                                        <div class="traffic-channel-group g-2">
                                                            <div class="traffic-channel-data">
                                                                <div class="title"><span class="dot dot-lg sq" data-bg="#ffdd00"></span><span>Female (Girls)</span></div>
                                                                <div class="amount"><?php echo number_format($female_pupils); ?> <small><?php echo $percentage_female; ?>%</small></div>
                                                            </div>
                                                            <div class="traffic-channel-data">
                                                                <div class="title"><span class="dot dot-lg sq" data-bg="#124491"></span><span>Male (Boys)</span></div>
                                                                <div class="amount"><?php echo  number_format($male_pupils); ?> <small><?php echo $percentage_male; ?>%</small></div>
                                                            </div>
                                                        </div><!-- .traffic-channel-group -->
                                                    </div><!-- .traffic-channel -->
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->

                                        <div class="col-md-4 col-xxl-4 col-sm-12">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">Pupils Disability Mainstreaming</h6>
                                                        </div>
                                                    </div>
                                                    <div class="traffic-channel">
                                                        <div class="traffic-channel-doughnut-ck">
                                                            <canvas class="analytics-doughnut" id="DisabilityMainstreaming"></canvas>
                                                        </div>

                                                        <div class="traffic-channel-group g-2">
                                                            <div class="traffic-channel-data">
                                                                <div class="title"><span class="dot dot-lg sq" data-bg="#ffdd00"></span><span>Abled</span></div>
                                                                <div class="amount"><?php echo  number_format($abled); ?> <small><?php echo $percentage_abled; ?>%</small></div>
                                                            </div>
                                                            <div class="traffic-channel-data">
                                                                <div class="title"><span class="dot dot-lg sq" data-bg="#124491"></span><span>PWD</span></div>
                                                                <div class="amount"><?php echo  number_format($pwd); ?> <small><?php echo $percentage_pwd; ?>%</small></div>
                                                            </div>
                                                        </div><!-- .traffic-channel-group -->
                                                    </div><!-- .traffic-channel -->
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->

                                        <div class="col-md-4 col-xxl-4 col-sm-12">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">Pupils Academic Level Distributions</h6>
                                                        </div>
                                                    </div>
                                                    <div class="traffic-channel">
                                                        <div class="traffic-channel-doughnut-ck">
                                                            <canvas class="analytics-doughnut" id="AcademicLevelDistribution"></canvas>
                                                        </div>
                                                        <br>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="traffic-channel-data">
                                                                <div class="title"><span class="dot dot-lg sq" data-bg="#129139"></span><span>Playgroup</span></div>
                                                                <div class="amount"><?php echo  number_format($playgroup_class); ?> <small><?php echo $percentage_playgroup; ?> %</small></div>
                                                            </div>
                                                            <div class="traffic-channel-data">
                                                                <div class="title"><span class="dot dot-lg sq" data-bg="#124491"></span><span>PP1</span></div>
                                                                <div class="amount"><?php echo  number_format($pp1_class); ?> <small><?php echo $percentage_pp1; ?>%</small></div>
                                                            </div>
                                                            <div class="traffic-channel-data">
                                                                <div class="title"><span class="dot dot-lg sq" data-bg="#ffdd00"></span><span>PP2</span></div>
                                                                <div class="amount"><?php echo  number_format($pp2_class); ?> <small><?php echo $percentage_pp1; ?>%</small></div>
                                                            </div>
                                                        </div><!-- .traffic-channel-group -->
                                                    </div><!-- .traffic-channel -->
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->

                                        <div class="col-md-12 col-xxl-12 col-sm-12">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-3">
                                                        <div class="card-title">
                                                            <h6 class="title">ECDE Enrollments Across Subcounties</h6>
                                                            <p>ECDE Pupils enrollments per academic level</p>
                                                        </div>
                                                    </div><!-- .card-title-group -->
                                                    <div class="nk-order-ovwg">
                                                        <div class="row g-4 align-end">
                                                            <div class="col-xxl-12">
                                                                <div class="nk-order-ovwg-ck">
                                                                    <canvas class="bar-chart" id="EnrollmentsPerSubcountyPerAcademicLevel"></canvas>
                                                                </div>
                                                                <div class="d-flex justify-content-center">
                                                                    <div class="title"><span class="dot dot-lg sq" data-bg="#124491"></span><span> Playgroup</span></div> &nbsp; &nbsp;
                                                                    <div class="title"><span class="dot dot-lg sq" data-bg="#ffdd00"></span><span> PP1</span></div> &nbsp;&nbsp;
                                                                    <div class="title"><span class="dot dot-lg sq" data-bg="#129139"></span><span> PP2</span></div> &nbsp;&nbsp;
                                                                </div>
                                                            </div><!-- .col -->
                                                        </div>
                                                    </div><!-- .nk-order-ovwg -->
                                                </div><!-- .card-inner -->
                                            </div><!-- .card -->
                                        </div>

                                        <div class="col-md-4 col-xxl-4 col-sm-12">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title text-center">ECDE Teachers Distribution</h6>
                                                        </div>
                                                    </div>
                                                    <div class="traffic-channel">
                                                        <div class="traffic-channel-doughnut-ck">
                                                            <canvas class="analytics-doughnut" id="TeachersBreakdown"></canvas>
                                                        </div>
                                                        <br>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="traffic-channel-data">
                                                                <div class="title"><span class="dot dot-lg sq" data-bg="#124491"></span><span>CET</span></div>
                                                                <div class="amount"><?php echo  number_format($county_teachers); ?> <small><?php echo $percentage_county; ?>%</small></div>
                                                            </div>
                                                            <div class="traffic-channel-data">
                                                                <div class="title"><span class="dot dot-lg sq" data-bg="#ffdd00"></span><span>PET</span></div>
                                                                <div class="amount"><?php echo  number_format($pet_teachers); ?> <small><?php echo $percentage_pet; ?>%</small></div>
                                                            </div>
                                                            <div class="traffic-channel-data">
                                                                <div class="title"><span class="dot dot-lg sq" data-bg="#129139"></span><span>PRIVATE</span></div>
                                                                <div class="amount"><?php echo  number_format($private_teachers); ?> <small><?php echo $percentage_private; ?>%</small></div>
                                                            </div>
                                                        </div><!-- .traffic-channel-group -->
                                                    </div><!-- .traffic-channel -->
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->

                                        <div class="col-md-8 col-xxl-8 col-sm-12">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-3">
                                                        <div class="card-title">
                                                            <h6 class="title">ECDE Centers Distribution</h6>
                                                            <p>ECDE centers distribution across all subcounties</p>
                                                        </div>
                                                    </div><!-- .card-title-group -->
                                                    <div class="nk-order-ovwg">
                                                        <div class="row g-4 align-end">
                                                            <div class="col-xxl-12">
                                                                <div class="nk-order-ovwg-ck">
                                                                    <canvas class="bar-chart" id="CentresDistributionPerSC"></canvas>
                                                                </div>
                                                            </div><!-- .col -->
                                                        </div>
                                                    </div><!-- .nk-order-ovwg -->
                                                </div><!-- .card-inner -->
                                            </div><!-- .card -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    <?php require_once('../partials/dashboard_charts.php'); ?>
</body>

</html>