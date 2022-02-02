$(document).ready(function () {
    $('#example').DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por paginas",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando páginas _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum  registro disponivel ",
            "infoFiltered": "(filtrado de  _MAX_ registros no total)",
            "sSearch": "Pesquisar : ",
            "processing": true,
            "serverSide": true,
            "paginate": {
                "previous": "Anterior",
                "next": "Próximo",
            },
        }

    });
});

