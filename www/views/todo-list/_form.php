<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\TodoList $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="todo-list-form">

	<?php $form = ActiveForm::begin([
        'id'=>'add-task-form',
        'action' => ['create'],
    ]); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'status')->dropDownList(\app\models\TodoList::getListStatus()) ?>

        <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

		<div class="form-group">
			<?= Html::button($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
