<script>
    $(document).ready(function() {

        var dataTablelatv = $('#get_todas_linhas').DataTable({
            "language": { //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "order": [
                [0, "desc"]
            ],
            "ajax": {
                url: "<?=site_url('lista-linhas-onibus')?>",
                type: 'GET'
            },
        });

        $(document).on('submit', '#form_add_linha_montagem', function(event) {
            event.preventDefault();

            var str_ln_montagem = $("#form_add_linha_montagem").serialize();

            $('#addlinhaMontagem').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Salvando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_add_linha_montagem").prop("disabled", true);

            $.ajax({
                url: "<?= site_url('adiciona-linha-montagem') ?>",
                type: 'POST',
                dataType: "json",
                data: str_ln_montagem,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgAddLinhaCarro").css('display', 'none');
                        swal("OK!", data.success, "success");

                        $('#addlinhaMontagem').html('<i class="fa fa-save"></i> Salvar');
                        $(".bt_add_linha_montagem").prop("disabled", false);
                        dataTablelatv.ajax.reload();  
                    } else {
                        $(".print-error-msgAddLinhaCarro").css('display', 'block');
                        $(".print-error-msgAddLinhaCarro").html(data.error);

                        $('#addlinhaMontagem').html('<i class="fa fa-save"></i> Salvar');
                        $(".bt_add_linha_montagem").prop("disabled", false);
                    }
                }
            });
        });

    });
</script>