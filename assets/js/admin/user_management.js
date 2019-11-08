$(document).ready(function(){
    $('#users_table').DataTable({
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

    $(document).on('click', '.action-edit', function(){
        var id = $(this).data('id');
        $(".preloader").show();
        $.ajax({
            url: '/admin/getuserontable/' + id,
            type: 'get',
            dataType: 'json',
            success: function(res){
                $('#input-file-disable-remove').removeAttr('disabled');
                $('.modal-content form input').attr('readonly', false);
                $('.modal-content form textarea').attr('disabled',false);
                $('.modal-content form select').attr('disabled',false);
                $('.modal-content form input[name="email"]').val(res.email).attr('readonly',true);
                $('.modal-content form select option[value="'+ res.role_id +'"]').attr('selected', 'selected');
                $('.modal-content form input[name="first_name"]').val(res.firstname);
                $('.modal-content form input[name="last_name"]').val(res.lastname);
                $('.modal-content form input[name="contact"]').val(res.contact);
                $('.modal-content form input[name="id"]').val(id);
                $('.modal-content form textarea').val(res.address);
                $('.modal-content form input[name="prev_photo"]').val(res.photo);
                $('.modal-title').html('<i class="ti ti-pencil-alt"></i> Edit user details');
                $('#btn-action').show();
                $('.dropify').dropify();
                var imagenUrl = '/assets/images/users/'+res.photo;
                var drEvent = $('#input-file-disable-remove').dropify(
                {
                  defaultFile: imagenUrl
                });
                drEvent = drEvent.data('dropify');
                drEvent.resetPreview();
                drEvent.clearElement();
                drEvent.settings.defaultFile = imagenUrl;
                drEvent.destroy();
                drEvent.init();
                $(".preloader").hide();
            }
        });
    });
   
    $(document).on('click', '.action-view', function(){
        var id = $(this).data('id');
        $(".preloader").show();
        $.ajax({
            url: '/admin/getuserontable/' + id,
            type: 'get',
            dataType: 'json',
            success: function(res){
                $('.modal-content form input[name="email"]').val(res.email);
                $('.modal-content form select option[value="'+ res.role_id +'"]').attr('selected', 'selected');
                $('.modal-content form input[name="first_name"]').val(res.firstname);
                $('.modal-content form input[name="last_name"]').val(res.lastname);
                $('.modal-content form input[name="contact"]').val(res.contact);
                $('.modal-content form textarea').val(res.address);
                $('.modal-content form input,.modal-content form select').removeAttr('readonly');
                $('.modal-content form textarea').attr('disabled',true);
                $('.modal-content form select').attr('disabled',true);
                $('#input-file-disable-remove').attr('disabled',true);
                $('.modal-title').html('<i class="ti ti-view-list-alt"></i> View user details');
                $('.modal-content form input').attr('readonly', true);
                $('#btn-action').hide();
                var imagenUrl = '/assets/images/users/'+res.photo;
                var drEvent = $('#input-file-disable-remove').dropify(
                {
                  defaultFile: imagenUrl
                });
                drEvent = drEvent.data('dropify');
                drEvent.resetPreview();
                drEvent.clearElement();
                drEvent.settings.defaultFile = imagenUrl;
                drEvent.destroy();
                drEvent.init();
                $(".preloader").hide();
            }
        });
    });

    $(document).on('click', '.action-remove', function(){
        alert('test');
        var id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: '/admin/deactivateuser/'+id,
            type: 'post',
            data: id,
            dataType: 'json',
            success: function(res){
                console.log(res);
            }
        });
    });
});