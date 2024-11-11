<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="DevTeam - martin.mbithi@makueni.go.ke">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@@page-discription">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="../public/images/small-logo.png" type="image/x-icon">
    <link rel="icon" href="../public/images/small-logo.png" type="image/x-icon">
    <!-- Page Title  -->
    <title>
        Makueni County ECDE System
    </title> <!-- StyleSheets  -->
    <link rel="stylesheet" href="../public/backoffice/css/dashlite.css?ver=1.4.0">
    <link id="skin-default" rel="stylesheet" href="../public/backoffice/css/theme.css?ver=1.4.0">
    <link rel="stylesheet" href="../public/backoffice/js/libs/sweetalert2/sweetalert2.min.css">
    <?php
    /* Alert Sesion Via Alerts */
    if (isset($_SESSION['success'])) {
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
    }
    /* Alert Sesion Via Alerts */
    if (isset($_SESSION['err'])) {
        $err = $_SESSION['err'];
        unset($_SESSION['err']);
    }
    ?>

    <!-- Google Tags -->

</head>