$(document).ready(function(){
    $("#cpf").mask("000.000.000-00")
    $("#cnpj").mask("00.000.000/0000-00")
    $("#telefone").mask("(00) 0000-00009")
    $("#salario").mask("999.999.990,00", {reverse: true})
    $("#cep").mask("00.000-000")
    $("#dataNascimento").mask("00/00/0000")
    $("#dataInicio").mask("00/00/0000")
    $("#dataFim").mask("00/00/0000")
    $("#horaInicio").mask("00:00")
    $("#horaFim").mask("00:00")

    
    $("#rg").mask("999.999.999-W", {
        translation: {
            'W': {
                pattern: /[X0-9]/
            }
        },
        reverse: true
    })
    
    var options = {
        translation: {
            'A': {pattern: /[A-Z]/},
            'a': {pattern: /[a-zA-Z]/},
            'S': {pattern: /[a-zA-Z0-9]/},
            'L': {pattern: /[a-z]/},
        }
    }
    
    $("#placa").mask("AAA-0000", options)
    
    $("#codigo").mask("AA.LLL.0000", options)
    
    $("#telefone").blur(function(event){
        if ($(this).val().length == 15){
            $("#telefone").mask("(00) 00000-00009")
        }elseif($(this).val().lenght == 14)
        {
            $("#telefone").mask("(00) 0000-00009")
        }
    })
})