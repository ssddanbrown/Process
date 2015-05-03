
$(document).ready(function() {

    var token = $('meta[name="csrf-token"]').attr('content');

    // Task completion
    $('.task-checkbox').click(function() {
        var checkbox = $(this);
        var taskItem = $(this).closest('.task-item');
        var url = checkbox.attr('data-task-url');
        var data = {
            _method: 'PATCH',
            _token: token
        };
        $.post(url, data, function(data, status) {
            if(data.complete) {
                taskItem.addClass('complete');
            } else {
                taskItem.removeClass('complete');
            }
        });
    });


});
//# sourceMappingURL=app.js.map