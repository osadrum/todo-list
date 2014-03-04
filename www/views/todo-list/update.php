<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\TodoList $model
 */

$this->title = 'Update Todo List: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Todo Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="todo-list-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
