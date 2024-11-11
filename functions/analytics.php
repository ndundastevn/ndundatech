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


/* All Learners */
$query = "SELECT COUNT(*) FROM pupils";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($all_pupils);
$stmt->fetch();
$stmt->close();

/* All Teachers */
$query = "SELECT COUNT(*) FROM users WHERE user_access_level ='ECDE Teacher'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($all_teachers);
$stmt->fetch();
$stmt->close();

/* All ECDE Centers */
$query = "SELECT COUNT(*) FROM ecde_centers";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($all_centers);
$stmt->fetch();
$stmt->close();

/* Learners Gender Distributions */
// Male
$query = "SELECT COUNT(*) FROM pupils WHERE pupil_gender = 'Male'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($male_pupils);
$stmt->fetch();
$stmt->close();

$percentage_male = $all_pupils > 0 ? number_format(($male_pupils / $all_pupils) * 100, 1) : 0.0;

// Female
$query = "SELECT COUNT(*) FROM pupils WHERE pupil_gender = 'Female'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($female_pupils);
$stmt->fetch();
$stmt->close();

$percentage_female = $all_pupils > 0 ? number_format(($female_pupils / $all_pupils) * 100, 1) : 0.0;

/* Learners By Academic Levels */
// Playgroup
$query = "SELECT COUNT(*) FROM pupils WHERE pupil_academic_level = 'Playgroup'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($playgroup_class);
$stmt->fetch();
$stmt->close();

$percentage_playgroup = $all_pupils > 0 ? number_format(($playgroup_class / $all_pupils) * 100, 1) : 0.0;

// PP1
$query = "SELECT COUNT(*) FROM pupils WHERE pupil_academic_level = 'PP1'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($pp1_class);
$stmt->fetch();
$stmt->close();

$percentage_pp1 = $all_pupils > 0 ? number_format(($pp1_class / $all_pupils) * 100, 1) : 0.0;

// PP2
$query = "SELECT COUNT(*) FROM pupils WHERE pupil_academic_level = 'PP2'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($pp2_class);
$stmt->fetch();
$stmt->close();

$percentage_pp2 = $all_pupils > 0 ? number_format(($pp2_class / $all_pupils) * 100, 1) : 0.0;

/* Learners Disability Mainstreaming */
// PWD (Persons with Disabilities)
$query = "SELECT COUNT(*) FROM pupils WHERE pupil_is_special = '1'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($pwd);
$stmt->fetch();
$stmt->close();

$percentage_pwd = $all_pupils > 0 ? number_format(($pwd / $all_pupils) * 100, 1) : 0.0;

// Abled
$query = "SELECT COUNT(*) FROM pupils WHERE pupil_is_special = '0'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($abled);
$stmt->fetch();
$stmt->close();

$percentage_abled = $all_pupils > 0 ? number_format(($abled / $all_pupils) * 100, 1) : 0.0;

/* Teachers By Employment Type */

// County Teachers
$query = "SELECT COUNT(*) FROM users 
WHERE user_access_level = 'ECDE Teacher'
AND user_employment_category = 'CET'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($county_teachers);
$stmt->fetch();
$stmt->close();

$percentage_county = $all_teachers > 0 ? number_format(($county_teachers / $all_teachers) * 100, 1) : 0.0;

// PET Teachers
$query = "SELECT COUNT(*) FROM users 
WHERE user_access_level = 'ECDE Teacher'
AND user_employment_category = 'PET'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($pet_teachers);
$stmt->fetch();
$stmt->close();

$percentage_pet = $all_teachers > 0 ? number_format(($pet_teachers / $all_teachers) * 100, 1) : 0.0;

$query = "SELECT COUNT(*) FROM users 
WHERE user_access_level = 'ECDE Teacher'
AND user_employment_category = 'PRIVATE'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($private_teachers);
$stmt->fetch();
$stmt->close();

$percentage_private = $all_teachers > 0 ? number_format(($private_teachers / $all_teachers) * 100, 1) : 0.0;


/* Centers Distribution Per Subcounties */

//Makueni
$query = "SELECT COUNT(*) FROM ecde_centers c INNER JOIN ward w ON w.ward_id = c.center_ward_id WHERE w.ward_sub_couty_id = 1";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($makueni_centers);
$stmt->fetch();
$stmt->close();

//Mbooni
$query = "SELECT COUNT(*) FROM ecde_centers c INNER JOIN ward w ON w.ward_id = c.center_ward_id WHERE w.ward_sub_couty_id = 2";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($mbooni_centers);
$stmt->fetch();
$stmt->close();

//Kaiti
$query = "SELECT COUNT(*) FROM ecde_centers c INNER JOIN ward w ON w.ward_id = c.center_ward_id WHERE w.ward_sub_couty_id = 4";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($kaiti_centers);
$stmt->fetch();
$stmt->close();

//Kilome
$query = "SELECT COUNT(*) FROM ecde_centers c INNER JOIN ward w ON w.ward_id = c.center_ward_id WHERE w.ward_sub_couty_id = 3";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($kilome_centers);
$stmt->fetch();
$stmt->close();

//Kibwezi West
$query = "SELECT COUNT(*) FROM ecde_centers c INNER JOIN ward w ON w.ward_id = c.center_ward_id WHERE w.ward_sub_couty_id = 5";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($kibwezi_west_centers);
$stmt->fetch();
$stmt->close();

//Kibwezi East
$query = "SELECT COUNT(*) FROM ecde_centers c INNER JOIN ward w ON w.ward_id = c.center_ward_id WHERE w.ward_sub_couty_id = 6";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($kibwezi_east_centers);
$stmt->fetch();
$stmt->close();


/* EnrollmentsPerSubcountyPerAcademicLevel */
$fetch_records_sql = mysqli_query(
    $mysqli,
    "SELECT * FROM sub_county ORDER BY sub_county_id"
);

$labels = [];
$playgroupData = [];
$pp1Data = [];
$pp2Data = [];

if (mysqli_num_rows($fetch_records_sql) > 0) {
    while ($rows = mysqli_fetch_array($fetch_records_sql)) {
        // Fetch counts for Playgroup, PP1, and PP2 in a single query
        $query = "SELECT 
            SUM(CASE WHEN p.pupil_academic_level = 'Playgroup' THEN 1 ELSE 0 END) AS playgroup,
            SUM(CASE WHEN p.pupil_academic_level = 'PP1' THEN 1 ELSE 0 END) AS pp1,
            SUM(CASE WHEN p.pupil_academic_level = 'PP2' THEN 1 ELSE 0 END) AS pp2
            FROM pupils p
            INNER JOIN ecde_centers c ON c.center_id = p.pupil_center_id
            INNER JOIN ward w ON w.ward_id = c.center_ward_id
            WHERE w.ward_sub_couty_id = '{$rows['sub_county_id']}'
        ";
        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        $stmt->bind_result($playgroup, $pp1, $pp2);
        $stmt->fetch();
        $stmt->close();

        // Collect data for chart rendering
        $labels[] = $rows['sub_county_name'];
        $playgroupData[] = $playgroup;
        $pp1Data[] = $pp1;
        $pp2Data[] = $pp2;
    }
}
