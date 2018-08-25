    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="<?= base_url(); ?>">
                            Printing Offset Kediri
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="ti ti-heart"></i> by <a href="#">Kevin</a>
            </div>
        </div>
    </footer>

</div>

</div>

</body>

    <!--   Core JS Files   -->
    <!-- <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script> -->
    <!-- <script type="text/javascript" src="<?= base_url('assets/assets/js/jquery-1.10.2.js'); ?>"></script> -->
    <script type="text/javascript" src="<?= base_url('assets/assets/js/bootstrap.min.js'); ?>"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <!-- <script src="assets/js/bootstrap-checkbox-radio.js"></script> -->
    <script src="<?= base_url('assets/assets/js/bootstrap-checkbox-radio.js'); ?>"></script>

    <!--  Charts Plugin -->
    <!-- <script src="assets/js/chartist.min.js"></script> -->
    <script src="<?= base_url('assets/assets/js/chartist.min.js'); ?>"></script>

    <!--  Notifications Plugin    -->
    <!-- <script src="assets/js/bootstrap-notify.js"></script> -->
    <script src="<?= base_url('assets/assets/js/bootstrap-notify.js'); ?>"></script>

    <!--  Google Maps Plugin    -->
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> -->

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <!-- <script src="assets/js/paper-dashboard.js"></script> -->
    <script src="<?= base_url('assets/assets/js/paper-dashboard.js'); ?>"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?= base_url('assets/assets/js/demo.js'); ?>"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            // $.notify({
            //     icon: 'ti-user',
            //     message: "User's Dashboard"

            // },{
            //     type: 'success',
            //     timer: 4000
            // });

        });
    </script>

</html>