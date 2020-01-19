<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClinesSearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="clines-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'servidor') ?>

    <?= $form->field($model, 'puerto') ?>

    <?= $form->field($model, 'usuario') ?>

    <?= $form->field($model, 'password') ?>

    <?php echo $form->field($model, 'fecha_alta') ?>

    <?php  echo $form->field($model, 'cliente_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
