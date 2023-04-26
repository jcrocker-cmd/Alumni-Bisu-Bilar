$(document).on('click', '.view_alumni_id', function(event) {
    event.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/records-of-students/' + id + '/ajaxview_aid',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#view_a_no').text(response.alumni_id.a_no);
            $('#view_id_no').text(response.alumni_id.id_no);
            $('#view_name').text(response.alumni_id.name);
            $('#view_address').text(response.alumni_id.address);
            $('#view_bday').text(response.alumni_id.bday);
            $('#view_course').text(response.alumni_id.course);
            $('#view_paymed').text(response.alumni_id.pay_med);
            $('#view_status').text(response.alumni_id.status);
            $('#view_sig img').attr('src', response.image_url);
            $('#view_date').text(moment(response.alumni_id.created_at).format('LLLL'));
        },
        error: function(xhr) {
            alert('Error: ' + xhr.responseText);
        }
    });
});
