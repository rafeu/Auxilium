$(document).ready(function(){
    $('.btnEdit').on('click', function(){
        $('#modalEditar').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function(){
            return $(this).Text();
        }).get();

        console.log(data);

        $('#cpfEdit').val(data[0]);
        $('#nomeCompletoEdit').val(data[1]);
        $('#emailEdit').val(data[2]);
        $('#dataNascimentoEdit').val(data[3]);
        $('#telefoneEdit').val(data[4]);
        $('#senhaEdit').val(data[5]);
    });
});