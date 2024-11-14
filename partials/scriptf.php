 <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../public/dgital/lib/wow/wow.min.js"></script>
    <script src="../public/dgital/lib/easing/easing.min.js"></script>
    <script src="../public/dgital/lib/waypoints/waypoints.min.js"></script>
    <script src="../public/dgital/lib/counterup/counterup.min.js"></script>
    <script src="../public/dgital/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../public/dgital/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="../public/dgital/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="../public/dgital/js/main.js"></script>

    <!-- Logout Modal -->
<?php include('../modals/logout.php'); ?>
<!-- Bundle Js -->
<script src="../public/backoffice/js/bundle.js?ver=1.4.0"></script>
<!-- Theme Base Script -->
<script src="../public/backoffice/js/scripts.js?ver=1.4.0"></script>
<!-- Sweet Alert Js -->
<script src="../public/backoffice/js/libs/sweetalert2/sweetalert2.min.js"></script>
<script src="../public/backoffice/js/apps/inbox.js?ver=1.4.0"></script>
<!-- Stepper -->
<script src="../public/backoffice/js/libs/bs-stepper/js/bs-stepper.min.js"></script>

<!-- Init Js -->
<?php include('../partials/alert.php'); ?>
<script>
    /* Prevent double resubmission on browser refresh */
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>