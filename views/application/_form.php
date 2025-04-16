<?php
declare(strict_types=1);

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/**
 * Partial view file to render the application form.
 *
 * @var yii\web\View $this The view object.
 * @var app\models\Application $model The application model.
 */

?>

<?php $form = ActiveForm::begin(['id' => 'application-form']); ?>
    <?= $form->field($model, 'first_name')->textInput() ?>
    <?= $form->field($model, 'last_name')->textInput() ?>
    <?= $form->field($model, 'date_of_birth')->input('date') ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'income')->textInput(['type' => 'number', 'step' => '0.01']) ?>
    <?= $form->field($model, 'number_of_dependants')->textInput(['type' => 'number']) ?>
    <?= Html::submitButton(
        ($model->isNewRecord) ? 'Create' : 'Update',
        ['class' => 'btn btn-primary'],
    ); ?>
<?php ActiveForm::end(); ?>
