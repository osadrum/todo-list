$(document).ready(function(){

    $(document).ready(function(){

        $("#add_task").on('click',function(){
            $("#add_modal").modal('show');
            return false;
        });

        var addTaskForm = $('#edit-task-form');

        addTaskForm.find('button').on('click', function(){
            event.preventDefault();

            if ( $(this).hasClass('btn-success') ) {

                $.ajax({
                    //url: '<?= Html::url(['create']) ?>',
                    dataType: 'json',
                    type: 'post',
                    data: addTaskForm.serialize(),
                    success: function(data) {
                        if ( data != null ) {
                            $("#tasks").find('ul').append('<li>'+data.title+'<a id="'+data.id+'" href="#" class="remove">x</a></li>');
                            $("#add_modal").modal('hide');
                        } else {

                        }
                    }
                });
            } else if ( $(this).hasClass('btn-primary') ) {
                $.ajax({
                    //url: '<?= Html::url(['update']) ?>/id/'+$('#todolist-id').val(),
                    dataType: 'json',
                    type: 'post',
                    data: addTaskForm.serialize(),
                    success: function(data) {

                    }
                });
            }
        });


        $('a.remove').on('click', function(e){
            var id = $(this).attr('id');
            var remove = $(this);
            $.ajax({
                url: $(this).attr('href'),
                dataType: 'json',
                type: 'get',
                data: {id: id},
                success: function(data) {
                    if ( data.errors == 0 ) {
                        var li = remove.parent();
                        li.css("background-color","red");
                        li.fadeOut(300, function(){
                            li.remove();
                        });
                    }
                }
            });
            return false;
        });

        $("#tasks  li").on('click', function(e){
            var id = $(this).find('a.remove').attr('id');
            $.ajax({
                //url: '<?= Html::url(['update']) ?>',
                type: 'get',
                data: {id: id},
                success: function(html) {
                    $("#modal-content").html(html);
                    $("#add_modal").modal('show');
                }
            });
        })
    })
});
