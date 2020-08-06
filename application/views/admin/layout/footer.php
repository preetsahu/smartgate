
    <!-- Mainly scripts -->
    <script src="<?= base_url()?>assets/admin/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url()?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url()?>assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?= base_url()?>assets/admin/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?= base_url()?>assets/admin/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url()?>assets/admin/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?= base_url()?>assets/admin/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?= base_url()?>assets/admin/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="<?= base_url()?>assets/admin/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?= base_url()?>assets/admin/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url()?>assets/admin/js/inspinia.js"></script>
    <script src="<?= base_url()?>assets/admin/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?= base_url()?>assets/admin/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="<?= base_url()?>assets/admin/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="<?= base_url()?>assets/admin/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?= base_url()?>assets/admin/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?= base_url()?>assets/admin/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="<?= base_url()?>assets/admin/js/plugins/toastr/toastr.min.js"></script>


    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Admin', 'Welcome to Smart Gate Entrance System');

            }, 1000);


            var data1 = [
                [0, 4],
                [1, 8],
                [2, 5],
                [3, 10],
                [4, 4],
                [5, 16],
                [6, 5],
                [7, 11],
                [8, 6],
                [9, 11],
                [10, 30],
                [11, 10],
                [12, 13],
                [13, 4],
                [14, 3],
                [15, 3],
                [16, 6]
            ];
            var data2 = [
                [0, 1],
                [1, 0],
                [2, 2],
                [3, 0],
                [4, 1],
                [5, 3],
                [6, 1],
                [7, 5],
                [8, 2],
                [9, 3],
                [10, 2],
                [11, 1],
                [12, 0],
                [13, 2],
                [14, 8],
                [15, 0],
                [16, 0]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ], {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#d5d5d5",
                    borderWidth: 1,
                    color: '#d5d5d5'
                },
                colors: ["#1ab394", "#1C84C6"],
                xaxis: {},
                yaxis: {
                    ticks: 4
                },
                tooltip: false
            });
                var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };
        });
    </script>
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '../../www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-4625583-2', 'webapplayers.com');
        ga('send', 'pageview');
    </script>


</body>
</html>