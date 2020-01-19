<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clines */

$this->title = 'Modificar Clines de : ' . $model->cliente_id;
$this->params['breadcrumbs'][] = ['label' => 'Clines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cliente_id, 'url' => ['view', 'cliente_id' => $model->cliente_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clines-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
