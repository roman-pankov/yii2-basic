<?php

/* @var $this yii\web\View */

$this->title = 'Регистрация физ.лица';

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Регистрация физ.лица</h1>

    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg12">
                <a href="/index.php?r=register" class="btn btn-default">< Назад</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <?php $form = ActiveForm::begin() ?>
                <?= $form->field($model, 'type')
                    ->hiddenInput(['value' => \app\models\RegisterForm::SCENARIO_INDIVIDUAL_ENTREPRENEUR])
                    ->label(false); ?>
                <?= $form->field($model, 'tin'); ?>
                <div class="form-group">
                    <div>
                        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>

    </div>
</div>
