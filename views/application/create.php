<?php
declare(strict_types=1);

use yii\bootstrap5\Html;

/**
 * View file to render the create application form.
 *
 * @var yii\web\View $this The view object.
 * @var app\models\Application $model The application model.
 */

$this->title = 'Create Application';

echo Html::tag('h1', $this->title);

echo $this->render('_form', ['model' => $model]);
