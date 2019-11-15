$(document).ready(function(){
	$('#input-file-disable-remove-edit').dropify();
	$('#input-file-disable-remove-add').dropify();

	$('#amenities_table').DataTable({
		 dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            }
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-pdf, .buttons-excel').addClass('btn btn-dark mr-1');

    $(document).on('submit', '#add_new_amenity', function(e){
    	e.preventDefault();
    	var data = new FormData($(this)[0]),
    		url = $(this).attr('action');

    	// data.append('file', $('input[type=file]')[0].files[0]);

    	// console.log(data);

    	$.ajax({
    		url: url,
    		data: data,
    		type: 'post',
    		dataType: 'json',
    		contentType: false,
    		processData: false,
    		success: function(res){
    			$.alert({
    				title: res.title,
    				content: res.content,
    				type: res.type,
    				buttons: {
    					ok: function(){
    						if (res.reload == true) {
    							location.reload();
    						}
    					}
    				}
    			});
    		}
    	});
    });
});