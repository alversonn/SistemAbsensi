$(document).ready(function() {
  var table = $('#table').DataTable({
      responsive: true,
      scrollX: false,
      order: [[3, 'desc']],
      language: {
          lengthMenu: "Show _MENU_ entries",
          searchPlaceholder: 'Search here...'
      }
  });

  new $.fn.dataTable.Buttons(table, {
      buttons: [{
          extend: 'collection',
          text: '<i class="bx bx-export bx-sm me-sm-2"></i> <span class="d-none d-sm-inline-block">Export</span>',
          className: 'btn btn-outline-primary buttons-collection dropdown-toggle btn-label-primary me-4',
          buttons: [
              { extend: 'copy', className: 'dropdown-item', text: '<i class="bx bx-copy me-2"></i> Copy' },
              { extend: 'csv', className: 'dropdown-item', text: '<i class="bx bx-file me-2"></i> CSV' },
              { extend: 'excel', className: 'dropdown-item', text: '<i class="bx bx-file me-2"></i> Excel' },
              { extend: 'pdf', className: 'dropdown-item', text: '<i class="bx bx-file me-2"></i> PDF' },
              {
                  extend: 'print',
                  className: 'dropdown-item',
                  text: '<i class="bx bx-printer me-2"></i> Print',
                  exportOptions: { columns: [1, 2, 3, 4, 5] },
                  title: 'Rekap Peminjaman Barang Laboratorium Informatika',
                  messageTop: 'Rekap Peminjaman Barang Laboratorium'
              }
          ]
      }]
  });

  // Append export buttons to custom container
  table.buttons().container().appendTo('#exportButtons');

  // Append "Tambah Record" button after export buttons
  $('#exportButtons').after(`
      <button class="btn btn-primary create-new ms-2" tabindex="0" aria-controls="table" type="submit" data-bs-toggle="offcanvas" data-bs-target="#add-new-record">
          <span>
              <i class="bx bx-plus bx-sm me-sm-2"></i>
              <span class="d-none d-sm-inline-block">Simpan</span>
          </span>
      </button>
  `);
});
