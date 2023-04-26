$(document).on('click', '.edit_alumni_id', function(event) {
    event.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/records-of-students/' + id + '/ajaxedit_aid',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#edit_aid_id').val(response.alumni_id.id);
            $('#edit_a_no').val(response.alumni_id.a_no);
            $('#edit_id_no').val(response.alumni_id.id_no);
            $('#edit_name').val(response.alumni_id.name);
            $('#edit_address').val(response.alumni_id.address);
            $('#edit_bday').val(response.alumni_id.bday);
            $('#edit_course').val(response.alumni_id.course);
            $('#edit_sig_img').attr('src', response.image_url);
        },
        error: function(xhr) {
            alert('Error: ' + xhr.responseText);
        }
    });
});
