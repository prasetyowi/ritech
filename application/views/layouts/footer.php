<!-- footer content -->
<footer>
    <div class="pull-right">
        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?= base_url() ?>assets/vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?= base_url() ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url() ?>assets/vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url() ?>assets/vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="<?= base_url() ?>assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="<?= base_url() ?>assets/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="<?= base_url() ?>assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="<?= base_url() ?>assets/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="<?= base_url() ?>assets/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="<?= base_url() ?>assets/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="<?= base_url() ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="<?= base_url() ?>assets/vendors/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?= base_url() ?>assets/build/js/custom.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url() ?>assets/vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="<?= base_url() ?>assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- jquery.inputmask -->
<script src="<?= base_url() ?>assets/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

<!-- Dropzone.js -->
<script src="<?= base_url() ?>assets/vendors/dropzone/dist/min/dropzone.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url() ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

<script>
    $('.filter_date_range_picker').daterangepicker({
        'applyClass': 'btn-sm btn-success',
        'cancelClass': 'btn-sm btn-default',
        locale: {
            "format": "DD/MM/YYYY",
            applyLabel: 'Apply',
            cancelLabel: 'Cancel',
        },
        'startDate': '<?= date("01-m-Y") ?>',
        'endDate': '<?= date("t-m-Y") ?>'
    });

    $(".select2").select2({
        width: '100%'
    });

    function message_custom(titleType, iconType, htmlType) {
        Swal.fire({
            title: titleType,
            icon: iconType,
            html: htmlType,
        });
    }

    function formatRupiah(angka) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return angka == undefined ? rupiah : (rupiah ? rupiah : '');
    }

    function sanitizeInput(input) {
        const dangerousChars = /[<>{}[\]'"\/\\;=%&$|`]/g;
        return input.replace(dangerousChars, "");
    }

    function validateInput(input) {
        const pattern = /^[a-zA-Z0-9\s.,]*$/;
        return pattern.test(input);
    }

    function validateOnKeyUp(event, idx) {
        const inputField = event.target;
        let sanitizedValue = sanitizeInput(inputField.value);
        inputField.value = sanitizedValue; // Apply sanitization directly

        const isValid = validateInput(sanitizedValue);
        const feedback = document.getElementById("feedback-" + idx);

        if (isValid) {
            feedback.textContent = "";
            feedback.style.color = "";
        } else {
            feedback.textContent = "Input tidak valid! Hanya huruf, angka, dan spasi yang diizinkan.";
            feedback.style.color = "red";
        }
    }
</script>

</body>

</html>