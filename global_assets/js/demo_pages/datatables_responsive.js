/* ------------------------------------------------------------------------------
*
*  # Responsive extension for Datatables
*
*  Demo JS code for datatable_responsive.html page
*
* ---------------------------------------------------------------------------- */

document.addEventListener('DOMContentLoaded', function () {


	// Table setup
	// ------------------------------

	// Setting datatable defaults
	$.extend($.fn.dataTable.defaults, {
		autoWidth: false,
		responsive: true,
		columnDefs: [{
			orderable: false,
			width: '100px'
		}],
		dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
		language: {
			search: '<span>Pencarian:</span> _INPUT_',
			searchPlaceholder: 'Masukan kata kunci...',
			lengthMenu: '<span>List:</span> _MENU_',
			paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
		},
		drawCallback: function () {
			$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
		},
		preDrawCallback: function () {
			$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
		}
	});


	// Basic responsive configuration
	$('.datatable-responsive').DataTable();


	// Column controlled child rows
	$('.datatable-responsive-column-controlled').DataTable({
		responsive: {
			details: {
				type: 'column'
			}
		},
		columnDefs: [
			{
				className: 'control',
				orderable: false,
				targets: 0
			},
			{
				width: "100px",
				targets: [0]
			},
			{
				orderable: false,
				targets: [0]
			}
		],
		order: [1, 'asc']
	});


	// Control position
	$('.datatable-responsive-control-right').DataTable({
		responsive: {
			details: {
				type: 'column',
				target: -1
			}
		},
		columnDefs: [
			{
				className: 'control',
				orderable: false,
				targets: -1
			},
			{
				width: "100px",
				targets: [0]
			},
			{
				orderable: false,
				targets: [0]
			}
		]
	});


	// Whole row as a control
	$('.datatable-responsive-row-control').DataTable({
		responsive: {
			details: {
				type: 'column',
				target: 'tr'
			}
		},
		columnDefs: [
			{
				className: 'control',
				orderable: false,
				targets: 0
			},
			{
				width: "100px",
				targets: [0]
			},
			{
				orderable: false,
				targets: [0]
			}
		],
		order: [1, 'asc']
	});



	// External table additions
	// ------------------------------

	// Enable Select2 select for the length option
	$('.dataTables_length select').select2({
		minimumResultsForSearch: Infinity,
		width: 'auto'
	});

});