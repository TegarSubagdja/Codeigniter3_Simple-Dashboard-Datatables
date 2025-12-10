$('#productTable').DataTable({
	"lengthMenu": [
		[5, 10, 25, -1],
		[5, 10, 25, "All"]
	],

	"columnDefs": [
		{ "orderable": false, "targets": [3, 6, 7] }
	],
	responsive: true
});
