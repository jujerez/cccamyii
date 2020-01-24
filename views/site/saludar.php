<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<div class="container">
    <div class="row">
        <div class="col-9 borde-sombreado  mt-5">
            <?php $form = ActiveForm::begin()?>

                <?= $form->field($model, 'nombre')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'telefono') ?>
                <?= $form->field($model, 'web') ?>

                <div class="form-group">
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-dark']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>

        <div class="col-3 mt-5 p-3 borde-sombreado">
        <div class="card" style="width: 18rem;">
        <img src=<?= Url::to('@web/images/parabolica.png') ?> class="card-img-top" alt="parabolica">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
</div>
        </div>
        
    </div>
</div>


  
