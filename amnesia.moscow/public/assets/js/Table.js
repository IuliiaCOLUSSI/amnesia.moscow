$(document).ready(function() {
var table = $('#example').DataTable({
rowReorder: {
selector: 'td:nth-child(2)'
},

responsive: true,
dom: 'Bfrtip',
buttons: [
'copyHtml5',
'excelHtml5',
'csvHtml5',
'pdfHtml5'
],
});
});