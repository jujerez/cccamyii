<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clines */

$this->title = 'Insertar una Cline';
$this->params['breadcrumbs'][] = ['label' => 'Clines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clines-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
       
    ]) ?>

</div>
