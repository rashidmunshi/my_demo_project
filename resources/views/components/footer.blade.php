<div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    2015 - 2019 &copy; UBold theme by <a href="">Coderthemes</a>
                </div>
                <div class="col-md-6">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript:void(0);">About Us</a>
                        <a href="javascript:void(0);">Help</a>
                        <a href="javascript:void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>



<script src="{{ asset('assets/js/vendor.min.js') }}"></script>


<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

<script src="{{ asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/libs/flot-charts/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/libs/flot-charts/jquery.flot.time.js') }}"></script>
<script src="{{ asset('assets/libs/flot-charts/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('assets/libs/flot-charts/jquery.flot.selection.js') }}"></script>
<script src="{{ asset('assets/libs/flot-charts/jquery.flot.crosshair.js') }}"></script>

<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ URL::asset('assets/js/custome.js') }}"></script>


<script src="{{ asset('assets/js/pages/dashboard-1.init.js') }}"></script>
<script src="{{ asset('assets/js/message_show.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<script src="{{ asset('assets/libs/ladda/spin.js') }}"></script>
<script src="{{ asset('assets/libs/ladda/ladda.js') }}"></script>
<script src="{{ asset('assets/js/pages/loading-btn.init.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script> --}}
<script src="{{ asset('assets/js/pages/sweet-alerts.init.js') }}"></script>
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

@yield('script')
