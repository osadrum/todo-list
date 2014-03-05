$(document).ready(function(){
    $("#add_task").on('click',function(){
        $("#add_modal").modal(true);
        return false;
    });

    var addTaskForm = $('#add-task-form');

    addTaskForm.find('button').on('click', function(){
        event.preventDefault();

        $.ajax({
            url: addTaskForm.attr('action'),
            type: 'post',
            data: addTaskForm.serialize(),
            success: function(data) {
                if ( data.errors == 0 ) {
                    addTaskForm.yiiGridView('update');
                } else {

                }
            }
        });
    })

});
