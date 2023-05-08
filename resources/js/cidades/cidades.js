import Validations from "../validations";

export default class Cidades {
    init() {
       // this.mask();
        this.validator = new Validations();
        this.iniciaTabela();
       // this.estados();
        this.bind();

    }

    bind() {
        var self = this;

        //cadastar nova cidade
        $(document).on("submit","#cadastro_cidades", (ev)=> {
            ev.preventDefault();
            let valor = $(ev.currentTarget).serialize();

            $.ajax({
                url: "/api/cidades",
                type: "POST",
                data: valor,
                success: function (response) {
                    window.location.href = "/cidades";
                },
                error: function (response) {
                    let erros = response.responseJSON.errors;
                    self.validator.validaRetornoApi(erros);
                }
            });
        });

        //editar cidade
        $(document).on("submit","#edicao_cidades", (ev)=> {
            ev.preventDefault();
            let cidadeId = $("#id").val();
            let valor = $(ev.currentTarget).serialize();

            $.ajax({
                url: "/api/cidades/" + cidadeId,
                type: "PATCH",
                data: valor,
                success: function (response) {
                    window.location.href = "/cidades";
                },
                error: function (response) {
                    let erros = response.responseJSON.errors;
                    self.validator.validaRetornoApi(erros);
                }
            });
        });

        //excluir cidade
        $('.tabela_cidades tbody').on('click', '.deletar_cidade', function (ev) {
            let cidadeId = $(ev.currentTarget).data('id');
            $.ajax({
                url: "/api/cidades/" + cidadeId,
                type: "DELETE",
                success: function (response) {
                    $(ev.currentTarget).closest('tr').remove();
                },
                error: function (response) {
                    let erros = response.responseJSON.errors;
                    self.validator.validaRetornoApi(erros);
                }
            });
        });
    }

    iniciaTabela() {
        $('.tabela_cidades').DataTable({
        	"language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
            },
            "scrollY": 300,
           
        });
    }
}