<!-- base js -->
<script src="{{ asset('admin-assets/js/app.js')}}"></script>
<script src="{{ asset('admin-assets/assets/plugins/feather-icons/feather.min.js')}}"></script>
<script src="{{ asset('admin-assets/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<!-- end base js -->

<!-- plugin js -->
<script src="{{ asset('admin-assets/assets/plugins/chartjs/Chart.min.js')}}"></script>
<script src="{{ asset('admin-assets/assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{ asset('admin-assets/assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{ asset('admin-assets/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('admin-assets/assets/plugins/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{ asset('admin-assets/assets/plugins/progressbar-js/progressbar.min.js')}}"></script>
<!-- end plugin js -->

<!-- common js -->
<script src="{{ asset('admin-assets/assets/js/template.js')}}"></script>
<!-- end common js -->

<script src="{{ asset('admin-assets/assets/js/dashboard.js')}}"></script>
<script src="{{ asset('admin-assets/assets/js/datepicker.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
<script src="https:////cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https:////cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="https:////cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>--}}
<script src="{{ asset('admin-assets/assets/plugins/select2/select2.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>--}}


<script>
    window._token = '{{ csrf_token() }}';
</script>
<script>
    $.extend(true, $.fn.dataTable.defaults, {
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/1.10.16/i18n/English.json"
        }
    });
</script>

<script src="{{ asset('js/main.js') }}"></script>

@yield('javascript')
