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
		<?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
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

    <?php Modal::begin([
     'header' => '<h2>Hello world</h2>',
     'toggleButton' => ['label' => 'click me'],
 ]);

 echo 'Say hello...';

 Modal::end(); ?>

</div>
