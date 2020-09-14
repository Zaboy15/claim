        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="{{asset('dist/js/demo.js')}}"></script>
    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
    <!-- PAGE SCRIPTS -->
    <script src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
    <script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>
    <script src="{{ asset('dist/code/highcharts.js') }}"></script>
    <script src="{{ asset('dist/code/modules/data.js') }}"></script>
    <script src="{{ asset('dist/code/modules/series-label.js') }}"></script>
    <script src="{{ asset('dist/code/modules/exporting.js') }}"></script>
    <script src="{{ asset('dist/code/modules/export-data.js') }}"></script>
    {{-- <script src="{{ asset('dist/code/modules/accessibility.js') }}"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> --}}
    @if(\Request::is('claim-request-approval'))
    <script type="text/javascript">
        $(function(){
            $('#claim-request').DataTable({
                "ajax": "{{ route('ClaimRequestData') }}",
                "columns": [
                    { "data": "claim_date" },
                    { "data": "product" },
                    { "data": "type" },
                    { "data": "serial_number" },
                    { "data": "area" },
                    { "data": "city" },
                    { "data": "store" },
                    { "data": "phone" },
                    { "data": "photos" }
                ]
            });
        });
    </script>
    @endif
    @if(\Request::is('claim-delivery'))
    <script type="text/javascript">
        $(function(){
            $('#claim-delivery').DataTable({
                "ajax": "{{ route('ClaimDeliveryData') }}",
                "columns": [
                    { "data": "claim_date" },
                    { "data": "fullname" },
                    { "data": "phone" },
                    { "data": "status" }
                ]
            });
        });
    </script>
    @endif
    @if(\Request::is('dashboard'))
    <script type="text/javascript">
        $.getJSON('{{ route("total_claim_per_product") }}', function(data) {
            Highcharts.chart('total_claim_per_product', {
                chart: {
                    scrollablePlotArea: {
                        minWidth: 700
                    }
                },  

                title: {
                    text: 'Total Claim Per Product'
                },
            
                xAxis: {
                    title: {
                        text: ''
                    }
                },
            
                yAxis: {
                    title: {
                        text: ''
                    }
                },
            
                legend: {
                    align: 'left',
                    verticalAlign: 'top',
                    borderWidth: 0
                },
            
                // tooltip: {
                //     shared: true,
                //     crosshairs: true
                // },
            
                /*plotOptions: {
                    series: {
                        cursor: 'pointer',
                        point: {
                            events: {
                                click: function (e) {
                                    hs.htmlExpand(null, {
                                        pageOrigin: {
                                            x: e.pageX || e.clientX,
                                            y: e.pageY || e.clientY
                                        },
                                        headingText: this.series.name,
                                        maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                            this.y + ' sessions',
                                        width: 200
                                    });
                                }
                            }
                        },
                        marker: {
                            lineWidth: 1
                        }
                    }
                },*/
            
                series: data
            });
        });
    </script>
    @endif
</body>
</html>