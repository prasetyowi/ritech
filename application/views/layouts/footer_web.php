    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>/assets/herobiz/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/herobiz/vendor/aos/aos.js"></script>
    <script src="<?= base_url() ?>/assets/herobiz/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url() ?>/assets/herobiz/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>/assets/herobiz/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/herobiz/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>/assets/herobiz/js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      $(function() {
        $(".datepicker").datepicker({
          changeMonth: true,
          changeYear: true,
          showButtonPanel: true,
          dateFormat: 'dd/mm/yy'
        });
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