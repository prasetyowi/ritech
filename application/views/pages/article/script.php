<script type="text/javascript">
    $(document).ready(function() {
        Get_all_article();
    });

    function Get_all_article() {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('article/Get_all_article') ?>",
            data: {},
            dataType: "JSON",
            success: function(response) {


                $('#table_list_article').fadeOut("slow", function() {
                    $(this).hide();

                    $('#table_list_article > tbody').empty('');

                    if ($.fn.DataTable.isDataTable('#table_list_article')) {
                        $('#table_list_article').DataTable().clear();
                        $('#table_list_article').DataTable().destroy();
                    }

                }).fadeIn("slow", function() {
                    $(this).show();

                    if (response.length != 0) {

                        $.each(response, function(i, v) {
                            $("#table_list_article > tbody").append(`
                                <tr class="even pointer">
                                    <td class="a-center ">${i+1}</td>
                                    <td class=" ">${v.article_judul}</td>
                                    <td class=" ">${v.tgl_post}</td>
                                    <td class=" ">${v.updwho}</td>
                                    <td class="text-center">
                                        <a href="<?= base_url() ?>article/edit/?id=${v.article_id}" target="_blank" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger" id="btn_delete_article" onclick="DeleteArticle('${v.article_id}')"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            `);
                        });

                        $("#table_list_article").DataTable({
                            lengthMenu: [
                                [50, 100, 200, -1],
                                [50, 100, 200, 'All'],
                            ],
                        });
                    }
                });
            }
        });
    }

    $("#btn_simpan_article").click(function(event) {

        event.preventDefault();

        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Pastikan data yang sudah anda input benar!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak"
        }).then((result) => {
            if (result.value == true) {

                var formData = new FormData();
                var fileInput = $('#Article-article_sampul')[0];
                var article_sampul = fileInput.files[0];


                formData.append('article_sampul', article_sampul);
                formData.append('article_judul', $("#Article-article_judul").val());
                formData.append('article_short_desc', $("#Article-article_short_desc").val());
                formData.append('article_desc', $("#editor-one")[0].innerHTML);

                $.ajax({
                    url: "<?= base_url('article/insert_article'); ?>",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Loading ...',
                            html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                            timerProgressBar: false,
                            showConfirmButton: false
                        });

                        $("#btn_simpan_article").prop("disabled", true);
                    },
                    data: formData,
                    dataType: "JSON",
                    success: function(response) {

                        if (response.status == 1) {
                            var alert = "Data Berhasil Disimpan";
                            message_custom("Success", "success", alert);
                            setTimeout(() => {
                                location.href = "<?= base_url() ?>article";
                            }, 500);

                            ResetForm();
                        } else if (response.status == "2") {

                            var alert = "Judul Artikel " + $('#article-article_judul').val() + " Sudah Ada";
                            message_custom("Error", "error", alert);
                        } else if (response.status == "3") {


                            console.log(response.data);
                            var alert = "Sampul belum dipilih";
                            message_custom("Error", "error", alert);
                        } else {
                            var alert = "Data Gagal Disimpan";
                            message_custom("Error", "error", alert);
                        }

                        $("#btn_simpan_article").prop("disabled", false);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        var alert = "Error 500 Internal Server Connection Failure";
                        message_custom("Error", "error", alert);

                        $("#btn_simpan_article").prop("disabled", false);
                    },
                    complete: function() {
                        // Swal.close();
                        $("#btn_simpan_article").prop("disabled", false);
                    }
                });
            }
        });
    });

    $("#btn_update_article").click(function(event) {

        event.preventDefault();

        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Pastikan data yang sudah anda input benar!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak"
        }).then((result) => {
            if (result.value == true) {

                var formData = new FormData();
                var fileInput = $('#Article-article_sampul')[0];
                var article_sampul = fileInput.files[0];

                formData.append('article_id', $("#Article-article_id").val());
                formData.append('article_judul', $("#Article-article_judul").val());
                formData.append('article_short_desc', $("#Article-article_short_desc").val());
                formData.append('article_desc', $("#editor-one")[0].innerHTML);
                formData.append('article_sampul', article_sampul);

                $.ajax({
                    url: "<?= base_url('article/update_article'); ?>",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Loading ...',
                            html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                            timerProgressBar: false,
                            showConfirmButton: false
                        });

                        $("#btn_simpan_article").prop("disabled", true);
                    },
                    data: formData,
                    dataType: "JSON",
                    success: function(response) {

                        if (response.status == 1) {
                            var alert = "Data Berhasil Disimpan";
                            message_custom("Success", "success", alert);
                            setTimeout(() => {
                                location.href = "<?= base_url() ?>article";
                            }, 500);

                            ResetForm();
                        } else if (response.status == "2") {

                            var alert = "Judul Artikel " + $('#article-article_judul').val() + " Sudah Ada";
                            message_custom("Error", "error", alert);
                        } else if (response.status == "3") {


                            console.log(response.data);
                            var alert = "Sampul belum dipilih";
                            message_custom("Error", "error", alert);
                        } else {
                            var alert = "Data Gagal Disimpan";
                            message_custom("Error", "error", alert);
                        }

                        $("#btn_simpan_article").prop("disabled", false);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        var alert = "Error 500 Internal Server Connection Failure";
                        message_custom("Error", "error", alert);

                        $("#btn_simpan_article").prop("disabled", false);
                    },
                    complete: function() {
                        // Swal.close();
                        $("#btn_simpan_article").prop("disabled", false);
                    }
                });
            }
        });
    });

    function resetImg() {
        $("#img_article_sampul").html('');
    }

    function DeleteArticle(article_id) {

        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Pastikan data yang anda hapus benar!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak"
        }).then((result) => {
            if (result.value == true) {

                $.ajax({
                    url: "<?= base_url('article/delete_article'); ?>",
                    type: "POST",
                    data: {
                        article_id: article_id
                    },
                    async: false,
                    dataType: "JSON",
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Loading ...',
                            html: '<span><i class="fa fa-spinner fa-spin" style="font-size:60px"></i></span>',
                            timerProgressBar: false,
                            showConfirmButton: false
                        });
                    },
                    success: function(response) {

                        if (response.status == 1) {
                            var alert = "Data Berhasil Dihapus";
                            message_custom("Success", "success", alert);
                            setTimeout(() => {
                                Get_all_article();
                            }, 500);
                        } else {
                            var alert = "Data Gagal Dihapus";
                            message_custom("Error", "error", alert);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        var alert = "Error 500 Internal Server Connection Failure";
                        message_custom("Error", "error", alert);
                    },
                    complete: function() {
                        // Swal.close();
                    }
                });
            }
        });
    }
</script>