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

	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'status')->textInput() ?>

		<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
