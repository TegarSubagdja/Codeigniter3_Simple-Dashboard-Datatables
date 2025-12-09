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

	$('#manualUploadZone').on('click', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$('#product_manual').trigger('click');
	});

	$('#uploadZone').on('click', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$('#product_image').trigger('click');
	});

	$('#product_manual').on('change', function () {
		var fileName = $(this).val().split('\\').pop();
		if (fileName) {
			$('#manualUploadZone #manual_file_display').text(fileName);
		} else {
			$('#manualUploadZone #manual_file_display').text('Click here to choose file');
		}
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
