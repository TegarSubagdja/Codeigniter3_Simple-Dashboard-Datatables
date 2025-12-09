$(document).ready(function () {
	$('#sidebar-toggle').on('click', function (e) {
		e.stopPropagation();
		$('#dashboard-layout').toggleClass('sidebar-open');
	});

	$('#sidebar a').on('click', function () {
		if ($(window).width() <= 991) {
			$('#dashboard-layout').removeClass('sidebar-open');
		}
	});

	$('#dashboard-layout').on('click', function (e) {
		if ($(window).width() <= 991) {
			if (!$(e.target).closest('#sidebar').length && !$(e.target).closest('#sidebar-toggle').length) {
				$('#dashboard-layout').removeClass('sidebar-open');
			}
		}
	});

	// Logika Upload Manual (PDF)
	$('#manualUploadZone').on('click', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$('#product_manual').trigger('click');
	});

	$('#product_manual').on('change', function () {
		var fileName = $(this).val().split('\\').pop();
		if (fileName) {
			$('#manualUploadZone #manual_file_display').text(fileName);
		} else {
			$('#manualUploadZone #manual_file_display').text('Click here to choose PDF manual');
		}
	});

	// Logika Upload Image
	$('#uploadZone').on('click', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$('#product_image').trigger('click');
	});

	$('#product_image').on('change', function () {
		var fileName = $(this).val().split('\\').pop();
		if (fileName) {
			$('#uploadZone #file_name_display').text(fileName);
		} else {
			$('#uploadZone #file_name_display').text('Click here to choose file');
		}
	});
});

$(document).on('click', '.btn-edit', function () {

	let item = $(this).closest('tr').data('item');

	// Set data umum
	$('#edit_id').val(item.id);
	$('#edit_name').val(item.name);
	$('#edit_category').val(item.category);
	$('#edit_stok').val(item.stok);
	$('#edit_location').val(item.location);
	$('#edit_specs').val(item.specs);

	// Image preview
	if (item.image) {
		$('#edit_preview_image').attr('src', '<?= base_url("uploads/images/") ?>' + item.image);
	} else {
		$('#edit_preview_image').attr('src', '');
	}

	// Manual PDF link
	if (item.manual) {
		$('#edit_manual_link').html(
			'<a href="<?= base_url("uploads/manuals/") ?>' + item.manual + '" target="_blank">' + item.manual + '</a>'
		);
	} else {
		$('#edit_manual_link').html('<span class="text-muted">No manual available</span>');
	}

	// Tampilkan modal
	$('#editModal').modal('show');
});

