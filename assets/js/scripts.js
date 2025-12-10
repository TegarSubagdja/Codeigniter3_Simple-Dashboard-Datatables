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

	$('#edit_id').val(item.id);
	$('#edit_name').val(item.name);
	$('#edit_category').val(item.category);
	$('#edit_stock').val(item.stock);
	$('#edit_location').val(item.location);
	$('#edit_specs').val(item.specs);

	if (item.image) {
		$('#edit_preview_image').attr('src', BASE_IMAGE_URL + item.image);
	} else {
		$('#edit_preview_image').attr('src', '');
	}

	if (item.manual) {
		$('#edit_manual_link').html(
			'<a href="' + BASE_MANUAL_URL + item.manual + '" target="_blank">' + item.manual + '</a>'
		);
	} else {
		$('#edit_manual_link').html('<span class="text-muted">No manual available</span>');
	}
	$('#editModal').modal('show');
});

$(document).ready(function () {
	$('#loginInfoModal').modal('show');
});

setTimeout(function () {
	$("#autoAlert").fadeTo(500, 0).slideUp(500, function () {
		$(this).remove();
	});
}, 2000);

