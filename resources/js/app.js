import './bootstrap';
/*
  Add custom scripts here
*/
import.meta.glob([
  '../assets/img/**',
  // '../assets/json/**',
  '../assets/vendor/fonts/**'
]);

import $ from 'jquery';
import DataTable from 'datatables.net-bs5'; // DataTables untuk Bootstrap 5
import 'datatables.net-buttons/js/buttons.html5'; // Tombol Export
import 'datatables.net-responsive'; // Fitur Responsif

$(document).ready(function () {
  $('#table').DataTable({
    responsive: true, // Aktifkan fitur responsif
    dom: 'Bfrtip', // Aktifkan tombol
    buttons: [
      'copy',
      'csv',
      'excel',
      'pdf',
      'print' // Tambahkan tombol Export
    ]
  });
});
