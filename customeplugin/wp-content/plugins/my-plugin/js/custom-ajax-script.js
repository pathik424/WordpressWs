jQuery(document).ready(function($) {
    $('.delete-button').on('click', function(e) {
        e.preventDefault();
        
        var postId = $(this).data('ID');
        
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'delete_data',
                post_id: postId,
                nonce: ajax_object.nonce
            },
            success: function(response) {
                if (response.success) {
                    alert('Data deleted successfully.');
                    // You can perform any additional actions here
                } else {
                    alert('Failed to delete data: ' + response.data);
                }
            },
            error: function(response) {
                alert('An error occurred.');
            }
        });
    });
});
