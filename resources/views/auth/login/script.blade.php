  <!-- Vendor JS Files -->
  <script src="../../assetsLogin/js/core/jquery.min.js"></script>
  <script src="../../assetsLogin/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      md.checkFullPageBackgroundImage();
      setTimeout(function() {
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700);
    });
  </script>