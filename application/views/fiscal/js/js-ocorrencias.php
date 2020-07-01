<script>
    $(document).ready(function() {

        var dataTableoc = $('#ocorrencias_get_all').DataTable({
            "language": { //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "order": [
                [0, "asc"]
            ],
            "ajax": {
                url: "<?= site_url('lista-ocorrencias') ?>",
                type: 'GET'
            },
        });

        $(document).on('submit', '#form_add_ocorencias', function(event) {
            event.preventDefault();

            var str_add_ocorrencia = $("#form_add_ocorencias").serialize();

            $('#addOcorrencia').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Salvando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_add_ocorrencia").prop("disabled", true);

            $.ajax({
                url: "<?= site_url('adiciona-ocorrencia') ?>",
                type: 'POST',
                dataType: "json",
                data: str_add_ocorrencia,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgAddOcorrencias").css('display', 'none');
                        swal("OK!", data.success, "success");

                        $('#addOcorrencia').html('<i class="fa fa-save"></i> Salvar');
                        $(".bt_add_ocorrencia").prop("disabled", false);
                        $('#form_add_ocorencias')[0].reset();
                        dataTableoc.ajax.reload();
                    } else {
                        $(".print-error-msgAddOcorrencias").css('display', 'block');
                        $(".print-error-msgAddOcorrencias").html(data.error);

                        $('#addOcorrencia').html('<i class="fa fa-save"></i> Salvar');
                        $(".bt_add_ocorrencia").prop("disabled", false);
                    }
                }
            });
        });

        /**visualiza linha um */
        $(document).on('click', '.btn_ver_ocorrencia', function() {
            let id_oc_vw = $(this).attr("id");
            $.ajax({
                url: "<?= site_url('visualiza-ocorrencia/') ?>" + id_oc_vw,
                method: "GET",
                data: {
                    id_oc_vw: id_oc_vw
                },
                beforeSend: function() {
                    $(".loader").css('display', 'block');
                },
                complete: function() {
                    $(".loader").css('display', 'none');
                },
                dataType: "json",
                success: function(data) {
                    $('#verOcorrenciasModal').modal('show');
                    $('#dados_correncia').val(data.dados_correncia);
                    $('#id_oc_vw').val(id_oc_vw);
                }
            })
        });

        /**altera ocorrencia */
        $(document).on('submit', '#form_altera_ocorencias', function(event) {
            event.preventDefault();

            var str_add_ocorrencia = $("#form_altera_ocorencias").serialize();
            var id_ocorrencia = $("input[name='id_oc_vw']").val();

            $('#aalterarOcorrencia').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Alterando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_altera_ocorrencia").prop("disabled", true);

            $.ajax({
                url: "<?= site_url('adiciona-ocorrencia/') ?>" + id_ocorrencia,
                type: 'POST',
                dataType: "json",
                data: str_add_ocorrencia,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgAlteraOcorrencias").css('display', 'none');
                        swal("OK!", data.success, "success");

                        $('#aalterarOcorrencia').html('<i class="fa fa-save"></i> Alterar');
                        $(".bt_altera_ocorrencia").prop("disabled", false);
                        dataTableoc.ajax.reload();
                    } else {
                        $(".print-error-msgAlteraOcorrencias").css('display', 'block');
                        $(".print-error-msgAlteraOcorrencias").html(data.error);

                        $('#aalterarOcorrencia').html('<i class="fa fa-save"></i> Alterar');
                        $(".bt_altera_ocorrencia").prop("disabled", false);
                    }
                }
            });
        });
    });
</script>