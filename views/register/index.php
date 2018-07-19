<?php

/* @var $this yii\web\View */

$this->title = 'Регистрация';

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Регистрация</h1>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <a href="/index.php?r=register/individual" class="btn btn-lg btn-primary">Регистрация физ.лица</a>
            </div>
            <div class="col-lg-4">
                <a href="/index.php?r=register/individual-entrepreneur" class="btn btn-lg btn-primary">Регистрация ИП</a>
            </div>
            <div class="col-lg-4">
                <a href="/index.php?r=register/legal-entity" class="btn btn-lg btn-primary">Регистрация юр.лица</a>
            </div>
        </div>

    </div>
</div>
