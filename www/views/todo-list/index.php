<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\TadoListSearch $searchModel
 */

/*$this->title = 'Todo Lists';
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="todo-list-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Добавить', '#', ['class' => 'btn btn-success','id'=>'add_task']) ?>
	</p>
<div id="tasks" class="col-lg-4">
    <ul>
        <?php foreach ( $tasks as $task):?>

            <li <?= \app\models\TodoList::getStatusClass($task['status']) ?>><?= $task['title'];?><a id="<?= $task['id'];?>" href="<?= Html::url(['delete']) ?>" class="remove">x</a></li>

        <?php endforeach; ?>
    </ul>


</div>

    <?php Modal::begin(['id'=>'add_modal']); ?>
            <div id='modal-content'></div>
     <?php Modal::end(); ?>

</div>
<script>
    $(document).ready(function(){

        $("#add_task").on('click',function(){
            $.ajax({
                url: '<?= Html::url(['create']) ?>',
                type: 'get',
                success: function(html) {
                    $("#modal-content").html(html);
                    $("#add_modal").modal('show');
                }
            });
            return false;
        });

        $("#tasks ul li").on('click', function(){
            var id = $(this).find('a.remove').attr('id');

            $.ajax({
                url: '<?= Html::url(['update']) ?>',
                type: 'get',
                data: {id: id},
                success: function(html) {
                    $("#modal-content").html(html);
                    $("#add_modal").modal('show');
                }
            });
            return false;
        })

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


    })
</script>