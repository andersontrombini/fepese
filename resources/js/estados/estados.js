import Validations from "../validations";

export default class Estados {
    init() {
       // this.mask();
        this.validator = new Validations();
        this.iniciaTabela();
       // this.estados();
        this.bind();

    }

    bind() {
        var self = this;
    }

    iniciaTabela() {
        $('.tabela_estados').DataTable({
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