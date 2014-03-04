<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\TodoList $model
 */

$this->title = 'Create Todo List';
$this->params['breadcrumbs'][] = ['label' => 'Todo Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-list-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
