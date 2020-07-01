<script>
    $(document).ready(function() {

        listaLinhas();
        var dataTableln = $('#listaLinhasTodas').DataTable({
            "language": { //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "order": [
                [0, "desc"]
            ],
            "ajax": {
                url: "<?= site_url('lista-todas-linha') ?>",
                type: 'GET'
            },
        });

        $(document).on('submit', '#form_add_linha', function(event) {
            event.preventDefault();

            let str_form_add_linha = $("#form_add_linha").serialize();

            $('#addlinha').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Salvando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_add_linha").prop("disabled", true);

            $.ajax({
                url: "<?= site_url('adiciona-linha') ?>",
                type: 'POST',
                dataType: "json",
                data: str_form_add_linha,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgFromAddLinha").css('display', 'none');
                        swal("OK!", data.success, "success");

                        $('#addlinha').html('<i class="fa fa-save"></i> Salvar');
                        $(".bt_add_linha").prop("disabled", false);
                        dataTableln.ajax.reload();
                        listaLinhas();
                        $('#form_add_linha')[0].reset();
                    } else {
                        $(".print-error-msgFromAddLinha").css('display', 'block');
                        $(".print-error-msgFromAddLinha").html(data.error);

                        $('#addlinha').html('<i class="fa fa-save"></i> Salvar');
                        $(".bt_add_linha").prop("disabled", false);
                    }
                }
            });
        });

        /**visualiza linha um */
        $(document).on('click', '.verLinha', function() {
            let id_vw_linha = $(this).attr("id");
            $.ajax({
                url: "<?= site_url('visualiza-dados-linha/') ?>" + id_vw_linha,
                method: "GET",
                data: {
                    id_vw_linha: id_vw_linha
                },
                beforeSend: function() {
                    $(".loader").css('display', 'block');
                },
                complete: function() {
                    $(".loader").css('display', 'none');
                },
                dataType: "json",
                success: function(data) {
                    $('#viewLinhaModalCenter').modal('show');
                    $('#linha_up_saida').val(data.linha_up_saida);
                    $('#linha_up_chega').val(data.linha_up_chega);
                    $('#id_vw_linha').val(id_vw_linha);
                }
            })
        });

                /**altera linha */
                $(document).on('submit', '#form_altera_linha', function(event) {
            event.preventDefault();

            let id_ln = $("input[name='id_vw_linha']").val();
            let str_form_altera_linha = $("#form_altera_linha").serialize();

            $('#aalteralinha').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Alterando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_altera_linha").prop("disabled", true);

            $.ajax({
                url: "<?= site_url('altera-dados-da-linha/') ?>" + id_ln,
                type: 'POST',
                dataType: "json",
                data: str_form_altera_linha,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgFromLinhaAltera").css('display', 'none');
                        swal("OK!", data.success, "success");

                        $('#aalteralinha').html('<i class="fa fa-save"></i> Alterar');
                        $(".bt_altera_linha").prop("disabled", false);
                        dataTablecar.ajax.reload();
                    } else {
                        $(".print-error-msgFromLinhaAltera").css('display', 'block');
                        $(".print-error-msgFromLinhaAltera").html(data.error);

                        $('#aalteralinha').html('<i class="fa fa-save"></i> Alterar');
                        $(".bt_altera_linha").prop("disabled", false);
                    }
                }
            });
        });

        function listaLinhas() {
            $.ajax({
                url: "<?=site_url('lista-todas-linhas')?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="select_linhas_montagem"]').empty();
                    $('select[name="select_linhas_montagem"]').append('<option selected disabled>Selecione aqui...</option>');
                    $.each(data, function(key, value) {
                        $('select[name="select_linhas_montagem"]').append('<option value="' + value.id_ln + '">' + value.linha_saida + ' / ' + value.linha_chegada + '</option>');
                    });
                }
            });
        }
    });
</script>