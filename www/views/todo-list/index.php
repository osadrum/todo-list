<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
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

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Добавить', '#', ['class' => 'btn btn-success','id'=>'add_task']) ?>
	</p>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
        'layout' => '{items}{pager}',
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'title',
			//'text:ntext',
            [
                'attribute' => 'status',
                'value' =>function ($model) {
                    return \app\models\TodoList::getStatusById($model->status);
                },

            ],


			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

    <?php Modal::begin(['id'=>'add_modal']); ?>

                <div id=''><?= $this->render('_form', [
                        'model' => $todoList,
                    ]) ?></div>

     <?php Modal::end(); ?>

</div>


