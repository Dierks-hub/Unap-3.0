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
