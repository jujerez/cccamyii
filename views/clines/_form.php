<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clines */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="clines-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'servidor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'puerto')->textInput() ?>

    <?= $form->field($model, 'usuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_alta')->textInput() ?>

    <?= $form->field($model, 'cliente_id')->dropDownList($listaClientes) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
