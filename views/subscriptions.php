<?php
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../helpers/users.php');
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
                                            <h3 class="nk-block-title page-title">Subscriptions</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>
                                                    This module allows you to manage Subscriptions<br>
                                                </p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                       
                                    </div>
                                    <!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->

                                
                                <div class="">
                                    <div class="row">
                                        <div class="card mb-3 col-md-12 border border-success">
                                            <div class="card-body">
                                                <table class="datatable-init table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Email</th>
                                                            <th>Date</th>                                                            
                                                            <th>Manage</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $fetch_records_sql = mysqli_query(
                                                            $mysqli,
                                                            "SELECT * FROM subscriptions "
                                                        );
                                                        if (mysqli_num_rows($fetch_records_sql) > 0) {
                                                            $cnt =  1;
                                                            while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $cnt; ?></td>
                                                                    <td><?php echo $rows['subscription_email']; ?></td>                                                                    
                                                                    <td><?php echo $rows['created_at']; ?></td>
                                                                    <td>
                                                                        <a data-toggle="modal" href="#update_<?php echo $rows['subscription_id']; ?>" class="badge badge-dim badge-pill badge-outline-secondary"><em class="icon ni ni-edit"></em> View</a>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                                $cnt = $cnt + 1;
                                                                // include('../modals/inquiry.php');
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->
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
</body>

</html>