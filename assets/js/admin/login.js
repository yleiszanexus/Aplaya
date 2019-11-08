$(document).ready(function(){

	$(document).on('submit', '#login_user', function(e){
		e.preventDefault();
		var action = $(this).attr('action');
		var method = $(this).attr('method');
		var form_data = $(this).serialize();

		$.ajax({
			url: action,
			type: method,
			data: form_data,
			dataType: 'json',
			success: function(res){
				if(res.success == false){
					$.alert({
					    title: 'Hey There!',
					    icon: 'fa fa-warning',
					    content: res.error,
					    type: 'orange',
					    buttons: {
						    ok: function(){
						    	console.log('test');
						    	$('#login_user input').addClass('border-bottom border-danger');
						    }
						}
					});
				}else{
					location.href = res.redirect;
				}
			}
		});
	});

	$(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });

});