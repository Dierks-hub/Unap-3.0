$(".cargoselector a").click(function () {
    $.ajax({
        url: "function.php",
        type: "POST",
        dataType: "json",
        data: {
            cases: 'dropdowncargo',
            var1: $(this).text()
        },
        success: function (resultado, status) {
            $(".cargoseleccionado").html(resultado.resp);
        },

        error: function (objeto, texterror) {
            alert("ERROR: Paso lo siguiente-> " + texterror);
        }
    })
});

$(document).ready(function () {
    // Función para configurar DataTable
    function configurarDataTable(tablaId) {
      $("#" + tablaId).DataTable({
        language: {
          search: "Buscar&nbsp;:",
          lengthMenu: "Agrupar de MENU items",
          processing: "Tratamiento en curso...",
          info: "Mostrando del item START al END de un total de TOTAL items",
          infoEmpty: "No existen datos.",
          infoFiltered: "(filtrado de MAX elementos en total)",
          infoPostFix: "",
          loadingRecords: "Cargando...",
          zeroRecords: "No se encontraron datos con tu busqueda",
          emptyTable: "No hay datos disponibles en la tabla.",
          paginate: {
            first: "Primero",
            previous: "Anterior",
            next: "Siguiente",
            last: "Ultimo",
          },
          aria: {
            sortAscending: ": active para ordenar la columna en orden ascendente",
            sortDescending:
              ": active para ordenar la columna en orden descendente",
          },
        },
        lengthMenu: [
          [16, 30, 40, -1],
          [16, 30, 40, "All"],
        ],
        paging: false,
        searching: false,
        pageLength: 16,
        responsive: false, // Hacer la tabla responsive
        order: [[0, "desc"]], // Cambia '0' por el índice de la columna que deseas ordenar
      });
    }
  
    // Llamar a la función para cada tabla
    configurarDataTable("tablaFiltros");
});
  

/*  EJEMPLO DATATABLE CON BOTONES
    new DataTable('#example', {
    responsive: true,
    order: [[0, "desc"]], // Cambia '0' por el índice de la columna que deseas ordenar
    language: {
        "decimal": "",
        "emptyTable": "No hay informacion para mostrar",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ carreras",
        "infoEmpty": "Mostrando 0 a 0 de 0 carreras",
        "infoFiltered": "(Filtrado de _MAX_ carreras totales)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ carreras",
        "loadingRecords": "Cargando...",
        "processing": "",
        "search": "Buscar:",
        "zeroRecords": "No se encontraron registros coincidentes",
        "paginate": {
            "first": "Primera",
            "last": "Ultima",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "aria": {
            "orderable": "Ordenar esta columna",
            "orderableReverse": "Revertir el orden de esta columna"
        }
    },

    layout: {
        topStart: 'pageLength',
        top2Start: {
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: '<i class="bi bi-file-earmark-excel"></i>',
                    titleAttr: 'Exportar Excel'
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="bi bi-file-earmark-pdf"></i>',
                    titleAttr: 'Exportar PDF'
                },
                {
                    extend: 'print',
                    text: '<i class="bi bi-printer"></i>',
                    titleAttr: 'Imprimir'
                }
            ]
        }
    }
}); */