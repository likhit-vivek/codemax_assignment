$(document).ready(function() {
	$("#add-form").submit(function(event) {
		event.preventDefault();
		
		var isValid = true;
		
		$('#add-form .form-control').each(function() {
			if($(this).val() == null || $(this).val() == '') {
				$('.alert-danger').html('Please enter all values');
				$('.alert-danger').removeClass('d-none');
				setTimeout(function() { $('.alert-danger').addClass('d-none'); }, 3000)
				isValid = false;
			}
		});
		
		if(isValid) {
			var formData = $(this).serialize();
			
			$.ajax({
				url: $(this).attr('action'),
				type: $(this).attr('method'),
				data: formData,
				dataType: 'json'
			}).done(function(data) {
				if(data.success) {
					$('.alert-success').removeClass('d-none');
					setTimeout(function() { $('.alert-success').addClass('d-none'); }, 3000)
				} else {
					$('.alert-danger').html(data.msg);
					$('.alert-danger').removeClass('d-none');
					setTimeout(function() { $('.alert-danger').addClass('d-none'); }, 3000)
				}
			}).fail(function() {
				$('.alert-danger').html('Unable to add manufacturer/model. Try again.');
				$('.alert-danger').removeClass('d-none');
				setTimeout(function() { $('.alert-danger').addClass('d-none'); }, 3000)
			});
		}
	});
});

var showModal = function(manufacturer, model) {
	$('.modal-body').load('content.php?manf='+manufacturer+'&model='+model, function() {
		$('#myModal').modal({show: true});
	});
}

var sell = function(id) {
	$.ajax({
		url: "model.php",
		type: "POST",
		data: { 'id': id, 'flag': true },
		dataType: 'json'
	}).done(function(data) {
		if(data.success) {
			$('.alert-success').removeClass('d-none');
			setTimeout(function() { $('.alert-success').addClass('d-none'); }, 3000);
			$('#'+id).remove();
		} else {
			$('.alert-danger').removeClass('d-none');
			setTimeout(function() { $('.alert-danger').addClass('d-none'); }, 3000);
		}
	}).fail(function() {
		$('.alert-danger').removeClass('d-none');
		setTimeout(function() { $('.alert-danger').addClass('d-none'); }, 3000);
	});
}