<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/logo.png', ['alt'=>Yii::$app->name,'style'=>['height'=>'40px']]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-dark bg-dark navbar-expand-md fixed-top',
        ],
        'collapseOptions' => [
            'class' => 'justify-content-end',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Clientes', 'url' => ['/clientes/index']],
            ['label' => 'Clines', 'url' => ['/clines/index']],
            ['label' => 'Usuarios', 
                'items' => [
                    Yii::$app->user->isGuest ? (['label' => 'Login', 'url' => ['/site/login']]) 
                    : (
                        Html::beginForm(['/site/logout'], 'post')
                      . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->nombre . ')',
                            ['class' => 'dropdown-item'],
                        )
                        . Html::endForm()
                        ),

                        Yii::$app->user->isGuest 
                        ? (['label' => 'Registrarse', 'url' => ['usuarios/registrar']])
                        : '',

                        !(Yii::$app->user->isGuest) 
                        ? (['label' => 'Modificar mis Datos', 'url' => ['usuarios/update']])
                        : '',

                        !(Yii::$app->user->isGuest) 
                        ? (['label' => 'Ver mis Datos', 'url' => ['usuarios/view', 'id' => Yii::$app->user->identity->id],])
                        : '',

                        !(Yii::$app->user->isGuest) && (Yii::$app->user->identity->nombre === 'admin')
                        ? (['label' => 'Ver todos los usuarios', 'url' => ['usuarios/index'],])
                        : '',
                    ],
                  
            ],

        ],
    ]);
    NavBar::end();


    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer bg-dark">
    <div class="container">
        <p class="float-left">&copy; Cccam service <?= date('Y') ?></p>

        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
