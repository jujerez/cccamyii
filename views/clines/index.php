<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClinesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clines-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Clines', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'servidor',
            'puerto',
            'usuario',
            'password',
            'fecha_alta',
            'cliente_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
