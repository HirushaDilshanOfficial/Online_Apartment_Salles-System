$(document).ready(function() {
    // Handle the form submission
    $('#publishNoticeForm').submit(function(event) {
        event.preventDefault(); 

        // Form validation
        let title = $('#title').val();
        let description = $('#description').val();
        if (!title || !description) {
            $('#status-message').text('Please fill out both fields').css('color', 'red');
            return;
        }

        // Clear status message
        $('#status-message').empty();

        //submission
        $.ajax({
            url: 'publish_notices.php',
            type: 'POST',
            data: {
                title: title,
                description: description
            },
            success: function(response) {
                let result = JSON.parse(response);
                if (result.status === 'success') {
                    $('#status-message').text(result.message).css('color', 'green');

                    
                    $('#notice-list').prepend('<li><strong>' + title + '</strong>: ' + description + 
                    ' <button class="delete-btn">Delete</button></li>');

                    // Clear form fields
                    $('#title').val('');
                    $('#description').val('');
                } else {
                    $('#status-message').text(result.message).css('color', 'red');
                }
            },
            error: function() {
                $('#status-message').text('An error occurred. Please try again.').css('color', 'red');
            }
        });
    });

    // Handle deletion of notices 
    $('#notice-list').on('click', '.delete-btn', function() {
        let noticeId = $(this).data('id');
        let listItem = $(this).closest('li');

        $.ajax({
            url: 'delete_notice.php?id=' + noticeId,
            type: 'GET',
            success: function(response) {
                listItem.remove(); 
            },
            error: function() {
                alert('Failed to delete notice. Please try again.');
            }
        });
    });
});
