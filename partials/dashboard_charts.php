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
?>
<script>
    "use strict";

    ! function(NioApp, $) {
        "use strict"; // Vector Map


        /* Gender Mainstreaming */
        var GenderMainstreaming = {
            labels: ["Female (Girls)", "Male (Boys)"],
            dataUnit: 'Pupils',
            legend: false,
            datasets: [{
                borderColor: "#fff",
                background: ["#124491", "#ffdd00"],
                data: [<?php echo $female_pupils; ?>, <?php echo $male_pupils; ?>]
            }]
        };

        /* Academic Level Mainstreaming */
        var AcademicLevelDistribution = {
            labels: ["Playgroup", "PP1", "PP2"],
            dataUnit: 'Pupils',
            legend: false,
            datasets: [{
                borderColor: "#fff",
                background: ["#129139", "#ffdd00", "#124491"],
                data: [<?php echo $playgroup_class; ?>, <?php echo $pp1_class; ?>, <?php echo $pp2_class; ?>]
            }]
        };


        /* PWD Mainstreaming */
        var DisabilityMainstreaming = {
            labels: ["PWD", "Abled"],
            dataUnit: 'Pupils',
            legend: false,
            datasets: [{
                borderColor: "#fff",
                background: ["#124491", "#ffdd00"],
                data: [<?php echo $pwd; ?>, <?php echo $abled; ?>]
            }]
        };

        /* Teachers Breakdown */
        var TeachersBreakdown = {
            labels: ["CET", "PET", "PRIVATE"],
            dataUnit: 'Teachers',
            legend: false,
            datasets: [{
                borderColor: "#fff",
                background: ["#124491", "#ffdd00", "#129139"],
                data: [
                    <?php echo $county_teachers; ?>, <?php echo $pet_teachers; ?>, <?php echo $private_teachers; ?>
                ],
            }]
        };


        /* Center Distribution */
        var CentresDistributionPerSC = {
            labels: [
                "Makueni",
                "Mbooni",
                "Kaiti",
                "Kilome",
                "Kibwezi West",
                "Kibwezi East"
            ],
            dataUnit: "Centers",
            datasets: [{
                label: "ECDE Centers",
                color: "#124491",
                data: [
                    <?php echo $makueni_centers; ?>, <?php echo $mbooni_centers; ?>, <?php echo $kaiti_centers; ?>, <?php echo $kilome_centers; ?>, <?php echo $kibwezi_west_centers; ?>, <?php echo $kibwezi_east_centers; ?>
                ],
            }],
        };

        /* Enrollments Per Subcounty Per Academic Level */
        var EnrollmentsPerSubcountyPerAcademicLevel = {
            labels: <?php echo json_encode($labels); ?>,
            dataUnit: "Pupils",
            datasets: [{
                    label: "Playgroup",
                    color: "#124491",
                    data: <?php echo json_encode($playgroupData); ?>,
                },
                {
                    label: "PP1",
                    color: "#ffdd00",
                    data: <?php echo json_encode($pp1Data); ?>,
                },
                {
                    label: "PP2",
                    color: "#129139",
                    data: <?php echo json_encode($pp2Data); ?>,
                },
            ],
        };


        function analyticsDoughnut(selector, set_data) {
            var $selector = selector ? $(selector) : $('.analytics-doughnut');
            $selector.each(function() {
                var $self = $(this),
                    _self_id = $self.attr('id'),
                    _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;

                var selectCanvas = document.getElementById(_self_id).getContext("2d");
                var chart_data = [];

                for (var i = 0; i < _get_data.datasets.length; i++) {
                    chart_data.push({
                        backgroundColor: _get_data.datasets[i].background,
                        borderWidth: 2,
                        borderColor: _get_data.datasets[i].borderColor,
                        hoverBorderColor: _get_data.datasets[i].borderColor,
                        data: _get_data.datasets[i].data
                    });
                }

                var chart = new Chart(selectCanvas, {
                    type: 'doughnut',
                    data: {
                        labels: _get_data.labels,
                        datasets: chart_data
                    },
                    options: {
                        legend: {
                            display: _get_data.legend ? _get_data.legend : false,
                            labels: {
                                boxWidth: 12,
                                padding: 20,
                                fontColor: '#6783b8'
                            }
                        },
                        rotation: -1.5,
                        cutoutPercentage: 50,
                        maintainAspectRatio: false,
                        tooltips: {
                            enabled: true,
                            callbacks: {
                                title: function title(tooltipItem, data) {
                                    return data['labels'][tooltipItem[0]['index']];
                                },
                                label: function label(tooltipItem, data) {
                                    return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']] + ' ' + _get_data.dataUnit;
                                }
                            },
                            backgroundColor: '#fff',
                            borderColor: '#eff6ff',
                            borderWidth: 5,
                            titleFontSize: 13,
                            titleFontColor: '#6783b8',
                            titleMarginBottom: 6,
                            bodyFontColor: '#9eaecf',
                            bodyFontSize: 12,
                            bodySpacing: 4,
                            yPadding: 10,
                            xPadding: 10,
                            footerMarginTop: 0,
                            displayColors: false
                        }
                    }
                });
            });
        }
        NioApp.coms.docReady.push(function() {
            analyticsDoughnut();
        });

        function barChart(selector, set_data) {
            var $selector = $(selector || ".bar-chart");
            $selector.each(function() {
                for (
                    var $self = $(this),
                        _self_id = $self.attr("id"),
                        _get_data = void 0 === set_data ? eval(_self_id) : set_data,
                        _d_legend = void 0 !== _get_data.legend && _get_data.legend,
                        selectCanvas = document.getElementById(_self_id).getContext("2d"),
                        chart_data = [],
                        i = 0; i < _get_data.datasets.length; i++
                )
                    chart_data.push({
                        label: _get_data.datasets[i].label,
                        data: _get_data.datasets[i].data,
                        backgroundColor: _get_data.datasets[i].color,
                        borderWidth: 4,
                        borderColor: "transparent",
                        hoverBorderColor: "transparent",
                        borderSkipped: "bottom",
                        barPercentage: 0.8,
                        categoryPercentage: 0.7,
                    });
                var chart = new Chart(selectCanvas, {
                    type: "bar",
                    data: {
                        labels: _get_data.labels,
                        datasets: chart_data
                    },
                    options: {
                        legend: {
                            display: !!_get_data.legend && _get_data.legend,
                            labels: {
                                boxWidth: 30,
                                padding: 40,
                                fontColor: "#6783b8"
                            },
                        },
                        maintainAspectRatio: !1,
                        tooltips: {
                            enabled: !0,
                            callbacks: {
                                title: function(a, t) {
                                    return t.datasets[a[0].datasetIndex].label;
                                },
                                label: function(a, t) {
                                    return (
                                        t.datasets[a.datasetIndex].data[a.index] +
                                        " " +
                                        _get_data.dataUnit
                                    );
                                },
                            },
                            backgroundColor: "#eff6ff",
                            titleFontSize: 13,
                            titleFontColor: "#6783b8",
                            titleMarginBottom: 6,
                            bodyFontColor: "#9eaecf",
                            bodyFontSize: 12,
                            bodySpacing: 4,
                            yPadding: 30,
                            xPadding: 30,
                            footerMarginTop: 0,
                            displayColors: !1,
                        },
                        scales: {
                            yAxes: [{
                                display: !0,
                                stacked: !!_get_data.stacked && _get_data.stacked,
                                ticks: {
                                    beginAtZero: !0,
                                    fontSize: 12,
                                    padding: 10,
                                    fontColor: "#9eaecf"
                                },
                                gridLines: {
                                    color: "#e5ecf8",
                                    tickMarkLength: 0,
                                    zeroLineColor: "#e5ecf8",
                                },
                            }, ],
                            xAxes: [{
                                display: !0,
                                stacked: !!_get_data.stacked && _get_data.stacked,
                                ticks: {
                                    fontSize: 12,
                                    fontColor: "#9eaecf",
                                    source: "auto"
                                },
                                gridLines: {
                                    color: "transparent",
                                    tickMarkLength: 10,
                                    zeroLineColor: "transparent",
                                },
                            }, ],
                        },
                    },
                });
            });
        }
        barChart();

    }(NioApp, jQuery);
</script>