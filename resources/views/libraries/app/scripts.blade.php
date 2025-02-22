<script src="{{asset('public/vendors/jquery/jquery.min.js')}}"></script>
<!--Bootstrap 4.4.1 -->
<script src="{{asset('public/vendors/bootstrap4.4.1/popper.min.js')}}"></script>
<script src="{{asset('public/vendors/bootstrap4.4.1/bootstrap.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('public/vendors/chart.js/Chart.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('public/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/vendors/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- iCheck -->
<script src="{{asset('public/vendors/iCheck/icheck.min.js')}}"></script>

<!-- Select2 -->
<script src="{{ asset("public/vendors/select2/dist/js/select2.full.min.js") }}"></script>

<!-- Datepicker-->
<script src="{{asset('public/vendors/datepicker/jquery-ui.js')}}" type="text/javascript"></script>

<!--Jquery confirm js (version 3.34) -->
<script src="{{asset('public/vendors/jquery-confirm-v3.3.4/dist/jquery-confirm.min.js')}}" type="text/javascript"></script>

<!-- Date Time Picker -->
<script src="{{asset('public/vendors/datetimepicker/build/jquery.datetimepicker.full.js')}}"></script>

<!-- Jquery Validation Library -->
<script src="{{asset('public/vendors/jquery_validation/js/jquery.validate.min.js')}}"></script>

<!-- Notify Js -->
<script src="{{asset('public/vendors/notifyjs/notify.min.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--Jquery Date Range Picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="{{asset('public/vendors/jquery_date_range_picker/moment.min.js')}}"></script>
<script src="{{asset('public/vendors/jquery_date_range_picker/daterangepicker.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.1/daterangepicker.min.js"></script>

<!-- alpine js -->
<script src="{{asset('public/assets/js/alpine.min.js')}}" defer ></script>
<script src="{{asset('public/assets/js/init-alpine.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('public/assets/js/parsley.js')}}"></script>


<script src="{{asset('public/vendors/jquery_date_range_picker/daterangepicker.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.1/daterangepicker.min.js"></script>


{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}


<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    console.log(typeof moment);
    console.log(typeof jQuery); 
    console.log(typeof $.fn.daterangepicker); // Should return 'function'

    $(document).ready(function () {
        $('#date_range').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#date_range').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#date_range').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
    });
</script>
<script>
    $(document).ready(function(){

        $('.select2').select2({
            placeholder: 'Select Option',
            theme: "classic",
            width : "100%",
            allowClear: true,

        });

        $('.select2-multiple').select2({
            theme: "classic",
            width : "100%",
            allowClear: true,
        });

        $('.i-check').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '10%' /* optional */
        });

        $('.i-check-dotted').iCheck({
            checkboxClass: 'icheckbox_futurico',
            radioClass: 'iradio_futurico',
            increaseArea: '30%' /* optional */
        });

        $('.i-check-flat-green').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green',
            increaseArea: '10%' /* optional */
        });

        $('.i-check-flat-pink').iCheck({
            checkboxClass: 'icheckbox_flat-pink',
            radioClass: 'iradio_flat-pink',
            increaseArea: '10%' /* optional */
        });

        let table = $('.dataTable').DataTable({
            'paging': false,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': false,
            'autoWidth': true,
            'responsive': true
        });

        function closeModal() {
            $('#modal_span_ticket_no').empty();
            $('#modal_tbl_tk_branch').empty();
            $('#modal_tbl_tk_type').empty();
            $('#modal_tbl_tk_customer').empty();
            $('#modal_tbl_tk_customer_type').empty();
            $('#modal_tbl_tk_contact_email').empty();
            $('#modal_tbl_tk_contact_tel').empty();
            $('#modal_tbl_tk_contact_cel').empty();
            $('#modal_tbl_tk_send_sms').empty();
            $('#modal_tbl_tk_subject').empty();
            $('#modal_tbl_tk_priority').empty();
            $('#modal_tbl_tk_assign').empty();
            $('#tbl_ticket_response_history_tbl_body').empty();

            $('#assign_tk_modal_ticket_no').empty();
            $('#reopen_tk_modal_ticket_no').empty();
            $('#reply_tk_modal_ticket_no').empty();
            $('#transfer_tk_modal_ticket_no').empty();

            $('#assign_tk_id').val('');
            $('#reopen_tk_id').val('');
            $('#reply_tk_id').val('');
            $('#transfer_tk_id').val('');

            $('#transfer_modal_current_branch').text('')

            $('#modal_call_info_tk_no').text('');
            $('#modal_call_info_call').empty()
            $('#modal_call_info_inquiry_type').empty();
            $('#modal_call_info_call_type').empty();
            $('#modal_call_info_line').empty()
            $('#modal_call_info_call_duration').empty();
            $('#modal_call_info_call_time').empty();

            $('#view_modal').modal('hide');
        }
        //Confirm Messages


        $(".form_create").on("submit", function (event) {

            event.preventDefault();
            let form = $(this)[0];

            $.confirm({
                type: 'green',
                typeAnimated: true,
                theme: 'modern',
                title: 'Confirm!',
                closeIcon: true,
                closeIconClass: 'fa fa-times',
                confirmButtonClass: 'btn-success',
                content: 'Do You want to Save ?',
                buttons: {
                    confirm: function () {

                        form.submit();
                    },
                    cancel: function () {
                        //Do Nothing
                    },
                }
            });
        });

        $(".form_search").on("submit", function (event) {
            event.preventDefault();
            let form = $(this)[0];

            $.confirm({
                type: 'dark',
                typeAnimated: true,
                theme: 'modern',
                title: 'Confirm!',
                closeIcon: true,
                closeIconClass: 'fa fa-times',
                confirmButtonClass: 'btn-secondary',
                content: 'Do you want to search ?',
                buttons: {
                    confirm: function () {

                        form.submit();
                    },
                    cancel: function () {
                        //Do Nothing
                    },
                }
            });

        });

        $(".form_edit").on("submit", function (event) {
            event.preventDefault();
            let form = $(this)[0];

            $.confirm({
                type: 'orange',
                typeAnimated: true,
                theme: 'modern',
                title: 'Confirm!',
                closeIcon: true,
                closeIconClass: 'fa fa-times',
                confirmButtonClass: 'btn-warning',
                content: 'Do you want to update ?',
                buttons: {
                    confirm: function () {

                        form.submit();
                    },
                    cancel: function () {
                        //Do Nothing
                    },
                }
            });

        });

        $(".form_delete").on("submit", function (event) {
            event.preventDefault();
            let form = $(this)[0];

            $.confirm({
                type: 'red',
                typeAnimated: true,
                theme: 'modern',
                title: 'Confirm!',
                closeIcon: true,
                closeIconClass: 'fa fa-times',
                confirmButtonClass: 'btn-danger',
                content: 'Do you want to Delete ?',
                buttons: {
                    confirm: function () {

                        form.submit();
                    },
                    cancel: function () {
                        //Do Nothing
                    },
                }
            });

        });

        $(".form_cancel").on("submit", function (event) {
            event.preventDefault();
            let form = $(this)[0];

            $.confirm({
                type: 'red',
                typeAnimated: true,
                theme: 'modern',
                title: 'Confirm!',
                closeIcon: true,
                closeIconClass: 'fa fa-times',
                confirmButtonClass: 'btn-danger',
                content: 'Do you want to Cancel ?',
                buttons: {
                    confirm: function () {

                        form.submit();
                    },
                    cancel: function () {
                        //Do Nothing
                    },
                }
            });

        });

        $(".form_change_status").on("submit", function (event) {
            event.preventDefault();
            let form = $(this)[0];

            $.confirm({
                type: 'red',
                typeAnimated: true,
                theme: 'modern',
                title: 'Confirm!',
                closeIcon: true,
                closeIconClass: 'fa fa-times',
                confirmButtonClass: 'btn-danger',
                content: 'Do you want to Change Status of this Record ?',
                buttons: {
                    confirm: function () {

                        form.submit();
                    },
                    cancel: function () {
                        //Do Nothing
                    },
                }
            });

        });

        $(".form_deactivate").on("submit", function (event) {
            event.preventDefault();
            let form = $(this)[0];

            $.confirm({
                type: 'red',
                typeAnimated: true,
                theme: 'modern',
                title: 'Confirm!',
                closeIcon: true,
                closeIconClass: 'fa fa-times',
                confirmButtonClass: 'btn-danger',
                content: 'Do you want to De-Activate ?',
                buttons: {
                    confirm: function () {

                        form.submit();
                    },
                    cancel: function () {
                        //Do Nothing
                    },
                }
            });

        });

        $(".form_unavailable").on("submit", function (event) {
            event.preventDefault();
            let form = $(this)[0];

            $.confirm({
                type: 'red',
                typeAnimated: true,
                theme: 'modern',
                title: 'Confirm!',
                closeIcon: true,
                closeIconClass: 'fa fa-times',
                confirmButtonClass: 'btn-danger',
                content: 'Do you want to Un-Available this Record ?',
                buttons: {
                    confirm: function () {

                        form.submit();
                    },
                    cancel: function () {
                        //Do Nothing
                    },
                }
            });

        });

        $(".form_continue").on("submit", function (event) {
            event.preventDefault();
            let form = $(this)[0];

            $.confirm({
                type: 'blue',
                typeAnimated: true,
                theme: 'modern',
                title: 'Confirm!',
                closeIcon: true,
                closeIconClass: 'fa fa-times',
                confirmButtonClass: 'btn-danger',
                content: 'Do you want to Continue ?',
                buttons: {
                    confirm: function () {

                        form.submit();
                    },
                    cancel: function () {
                        //Do Nothing
                    },
                }
            });

        });

        $(".no_rollback").on("submit", function (event) {
            event.preventDefault();
            let form = $(this)[0];
            let additional_message = '<span class="text-danger m-2 font-weight-bold">If you confirmed, then you can never Edit this Again!</span>'
            $.confirm({
                type: 'green',
                typeAnimated: true,
                theme: 'modern',
                title: 'Confirm!',
                columnClass: 'medium',
                closeIcon: true,
                closeIconClass: 'fa fa-times',
                confirmButtonClass: 'btn-success',
                content: 'Do you want to Save this ?<br/>'+additional_message,
                buttons: {
                    confirm: function () {

                        form.submit();
                    },
                    cancel: function () {
                        //Do Nothing
                    },
                }
            });

        });

        $(".form_disable").on("submit", function (event) {
            event.preventDefault();
            let form = $(this)[0];

            $.confirm({
                type: 'red',
                typeAnimated: true,
                theme: 'modern',
                title: 'Confirm!',
                closeIcon: true,
                closeIconClass: 'fa fa-times',
                confirmButtonClass: 'btn-danger',
                content: 'Do you want to Disable  ?',
                buttons: {
                    confirm: function () {

                        form.submit();
                    },
                    cancel: function () {
                        //Do Nothing
                    },
                }
            });

        });

        $(".form_enable").on("submit", function (event) {
            event.preventDefault();
            let form = $(this)[0];

            $.confirm({
                type: 'green',
                typeAnimated: true,
                theme: 'modern',
                title: 'Confirm!',
                closeIcon: true,
                closeIconClass: 'fa fa-times',
                confirmButtonClass: 'btn-danger',
                content: 'Do you want to Enable  ?',
                buttons: {
                    confirm: function () {

                        form.submit();
                    },
                    cancel: function () {
                        //Do Nothing
                    },
                }
            });

        });
    });
    //Date Picker

    jQuery('.datepicker').datetimepicker({
        timepicker:false,
        format:'Y-m-d'
    });


</script>

<script>
    $(function() {
        // setTimeout() function will be fired after page is loaded
        // it will wait for given sec. and then will fire
        // $("#giver id of the div").hide() function
        // used for fade out notification messages
        setTimeout(function() {
            $('#successMessage').fadeOut('normal');
        }, 3000);

        setTimeout(function() {
            $('#warningMessage').fadeOut('normal');
        }, 3000);
        setTimeout(function() {
            $('#infoMessage').fadeOut('normal');
        }, 3000);

        setTimeout(function() {
            $('#errorStringMessage').fadeOut('normal');
        }, 5000);

        setTimeout(function() {
            $('#errorMessages').fadeOut('normal');
        }, 30000);

    });


    hidePreloader();
    function hidePreloader(){
        setTimeout(function() {
            $('#preloader').hide();
        }, 3000);

    }
</script>
