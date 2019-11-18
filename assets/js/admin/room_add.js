$(document).ready(function(){
	$('#description').summernote({
		height: 300,
		toolbar: [
			['style', ['bold', 'italic', 'underline', 'clear']],
		    ['font', ['strikethrough', 'superscript', 'subscript']],
		    ['fontsize', ['fontsize']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['height', ['height']]
		]
	});

	$('.js-switch').each(function () {
        new Switchery($(this)[0], $(this).data());
    });

    var changeCheckbox = document.querySelector('.js-switch');

	changeCheckbox.onchange = function() {
		if(changeCheckbox.checked == true){
			$('#sale_input').show();
		}else{
			$('#sale_input').hide();
		}
	};

	$('.select2').select2();

	$('#room_photo').dropify();
});