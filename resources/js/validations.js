export default class Validations {

    validaRetornoApi(values) {
        $(".clear").addClass("d-none");
        $.each(values, (index, valor) => {
            $("." + index + "-feedback").removeClass("d-none");
            $("." + index + "-feedback").html(valor);
            $("#" + index ).focus();
        })
    }
}