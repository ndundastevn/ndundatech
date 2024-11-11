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

session_start();
require_once('../config/config.php');
require_once('../functions/analytics.php');
require_once('../partials/landing_head.php');
?>

<body>
    <!--=====preloader START=======-->
    <div id="pre-load" class="loader6">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="../public/img/logos/small-logo.png" alt="IVA System"></div>
            </div>
        </div>
    </div>
    <!--=====preloader end=======-->

    <!--=====progress START=======-->

    <div class="paginacontainer">

        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">

                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>

    </div>

    <!--=====progress END=======-->
    <!--=====HEADER =======-->
    <header class="header about-bg d-none d-lg-block">
        <div class="header-area header" id="header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header-elements">
                            <div class="site-logo">
                                <a href="../"><img src="../public/img/logos/merged_logos.png" width="30%" alt=""></a>
                            </div>
                            <div class="main-menu-ex homepage3 homepage5 homepage6">
                                <ul>
                                    <li><a href="../" class="font-nunito font-16 weight-600 color-1 ">Home</a></li>
                                    <li><a href="landing_insights" class="font-nunito font-16 weight-600 color-1 text-warning">About</a></li>
                                    <li><a href="login" class="font-nunito font-16 weight-600 color-1">Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--===== HEADER END=======-->

    <!--=====Mobile header start=======-->
    <div class="mobile-header mobile-header-4 d-block d-lg-none homepagesmall">
        <div class="container-fluid">
            <div class="col-12">
                <div class="mobile-header-elements">
                    <div class="mobile-logo">
                        <a href="../"><img src="../public/img/logos/merged_logos.png" width="40%" alt=""></a>
                    </div>
                    <div class="mobile-nav-icon dots-menu">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-sidebar">
        <div class="logoicons-area">
            <div class="logos">
                <img src="../public/img/logos/merged_logos.png" width="40%" alt="">
            </div>
            <div class="menu-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <div class="mobile-nav">

            <ul class="mobile-nav-list">
                <li><a href="../" class="font-nunito font-18 weight-600 color">Home</a></li>
                <li><a href="landing_insights" class="font-nunito font-18 weight-600 color text-warning">About</a></li>
                <li><a href="login" class="font-nunito font-18 weight-600 color">Login</a></li>
            </ul>
        </div>
    </div>
    <!--===== Mobile header end=======-->

    <!--===== WELCOME-3 STARTS=======-->
    <!--===== ABOUT STARTS =======-->
    <div class="abouthome6-section-areas section-padding5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="aboutsecond-area margin-t50">
                        <div class="row align-items-center">
                            <div class="col-lg-12" data-aos="fade-right" data-aos-duration="800">
                                <div class="about6-second-txetxarea">
                                    <h1 class="font-lora font-44 lineh-52 weight-600 colorwel margin-b20" data-aos="fade-right" data-aos-duration="1200">About Us </h1>
                                    <p class="font-nunito font-16 weight-500 color-nuni margin-b20 lineh-26">
                                    </p>
                                        At Makueni County, we believe that early childhood development is the foundation of lifelong learning and success. Our ECDE program is designed to nurture children’s growth by
                                        providing a safe, inclusive, and stimulating environment that fosters cognitive, social, and emotional development from an early age. With <?php echo number_format($all_centers); ?>
                                        ECDE centers across the county, we are committed to delivering accessible, high-quality early education to all. Our approach integrates modern teaching techniques, holistic care, and
                                        community involvement, ensuring children have the best possible start in life. Our teachers are well-trained professionals dedicated to supporting each child’s unique potential.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== ABOUT ENDS =======-->

    <!--===== COUNTER STARTS =======-->
    <div class="counter6-scetion-area section-padding7" data-aos="zoom-in" data-aos-duration="1400">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="counter6-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="counterall6">
                                    <div class="counter6span">
                                        <h1 class="font-lora font-44 lineh-44 weight-600 color margin-b20"><span class="counter"><?php echo number_format($all_centers); ?></span></h1>
                                        <p class="font-18 font-nunito weight-500 color-27 lineh-26">State of the art ECDE centers</p>
                                    </div>
                                    <div class="counter6span">
                                        <h1 class="font-lora font-44 lineh-44 weight-600 color margin-b20"><span class="counter"><?php echo number_format($all_pupils); ?></span></h1>
                                        <p class="font-18 font-nunito weight-500 color-27 lineh-26">Enrolled pupils</p>
                                    </div>
                                    <div class="counter6span">
                                        <h1 class="font-lora font-44 lineh-44 weight-600 color margin-b20"><span class="counter"><?php echo number_format($all_teachers); ?></span></h1>
                                        <p class="font-18 font-nunito weight-500 color-27 lineh-26">Experienced Teachers</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== COUNTER ENDS =======-->
    <?php require_once('../partials/landing_footer.php'); ?>
    <!--===== FOOTER END=======-->
    <?php require_once('../partials/landing_scripts.php'); ?>


</body>


</html>