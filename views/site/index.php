<?php
declare(strict_types=1);


/** @var yii\web\View $this */

use yii\bootstrap5\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col">
                <ul>
                    <li>
                        <?= Html::a('Create Application', ['/application/create']); ?>
                    </li>
                    <li>
                        <?= Html::a('Edit Application', ['/application/edit', 'id' => 1]); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
