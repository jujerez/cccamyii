<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<p>Gracias por enviar el formulario:</p>

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Url</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row"><?= Html::encode($model->nombre) ?></td>
                        <td><?= Html::encode($model->email) ?></td>
                        <td><?= Html::encode($model->telefono) ?></td>
                        <td><?= Html::encode($model->web) ?></td>
                    </tr>
                    
                </tbody>
            </table>

            <a class="btn btn-lg btn-success" href="<?=Url::home()?>">Volver a Inicio</a></p>
        </div>
        
    </div>
</div>