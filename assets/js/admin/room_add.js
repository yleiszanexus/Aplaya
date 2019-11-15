$(document).ready(function(){
	$('#description').summernote({
		height: 300
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
});