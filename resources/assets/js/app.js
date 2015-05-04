
$(document).ready(function() {

    var token = $('meta[name="csrf-token"]').attr('content');

    // Task completion
    $('.group-box').on('click', '.task-checkbox',function() {
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

    // Adding a task
    $('form.task-form-ajax').submit(function() {
        var form = $(this);
        var taskList = form.closest('.group-box').find('.task-list-group').first();
        var data = form.serialize() + '&ajax=true';
        $.post(form.attr('action'), data, function(data, status) {
            var taskElem = $(data);
            taskList.prepend(taskElem);
            form.find('input[name="name"]').val('');
        });
        return false;
    });


});