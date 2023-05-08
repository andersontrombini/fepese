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

        $(document).on("submit","#cadastro_cidades", (ev)=> {
            let valor = $(ev.currentTarget).serialize();
alert(valor);
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
            });;
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