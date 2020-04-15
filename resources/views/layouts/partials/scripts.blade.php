<!-- Mainly scripts -->
<script src="{{ asset('js/plugins/fullcalendar/moment.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Flot -->
<script src="{{ asset('js/plugins/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('js/plugins/flot/jquery.flot.spline.js') }}"></script>
<script src="{{ asset('js/plugins/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('js/plugins/flot/jquery.flot.pie.js') }}"></script>

<!-- Peity -->
<script src="{{ asset('js/plugins/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('js/demo/peity-demo.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('js/inspinia.js') }}"></script>
<script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- GITTER -->
<script src="{{ asset('js/plugins/gritter/jquery.gritter.min.js') }}"></script>

<!-- Sparkline -->
<script src="{{ asset('js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Sparkline demo data  -->
<script src="{{ asset('js/demo/sparkline-demo.js') }}"></script>

<!-- ChartJS-->
<script src="{{ asset('js/plugins/chartJs/Chart.min.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('js/plugins/toastr/toastr.min.js') }}"></script>

<!-- Redirect -->
<script src="{{ asset('js/jquery.redirect.js') }}"></script>

<!-- Calendar -->
<script type="text/javascript" src="{{ asset('js/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/iCheck/icheck.min.js') }}"></script>

<!-- Blueimp gallery -->
<script src="{{ asset('js/plugins/blueimp/jquery.blueimp-gallery.min.js') }}"></script>

<!-- Sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).on('click', '.logout-btn', function() {
    var url = "{{ url('logout') }}";
    var csrf = "{{ csrf_token() }}";

    swal({
        text: "Apakah anda yakin untuk keluar dari aplikasi ?" ,
        icon: "warning",
        dangerMode: true,
        buttons: {
            cancel: {
                text: "Batal",
                value: false,
                visible: true,
                className: "btn btn-sm btn-white"
            },
            confirm: {
                text: "Keluar",
                value: true,
                visible: true,
                className: "btn btn-sm btn-danger",
                closeModal: true
            }
        }
    }).then((value) => {
        if (value === true) {
            $.redirect(url, {"_token": csrf});
        }
        swal.close();
    });;
});
</script>
