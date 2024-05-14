<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <link rel="icon" href="./images/tutorias.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- BS ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- FONT AWESOME - PARA CARGAR LOS ICONOS DEL GRIDVIEW -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <header>
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
            ],
        ]);
        $menuItems = [
            ['label' => 'INICIO', 'url' => ['/site/index']],

        ];
        if (Yii::$app->user->isGuest) {
            /* 
        $menuItems[] = ['label' => 'About', 'url' => ['/site/about']];
        $menuItems[] = ['label' => 'Contact', 'url' => ['/site/contact']];
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']]; 
        */
            $menuItems[] = ['label' => 'INGRESAR', 'url' => ['/site/login']];
        } else{
            if (Yii::$app->user->can('tutor')) {
                $menuItems[] = ['label' => 'PERFIL', 'url' => ['/tutor/index']];
                $menuItems[] = ['label' => 'GRUPO', 'url' => ['/grupo-master/index']];
                $menuItems[] = ['label' => 'PAT', 'url' => ['/pat/index']];
                $menuItems[] = ['label' => 'DIAGNÓSTICO', 'url' => ['/diagnostico/index']];
                $menuItems[] = ['label' => 'LIBERACIÓN', 'url' => ['/evaluacion/index']];
                $menuItems[] = ['label' => 'CONTACTO', 'url' => ['/canalizacion/index']];
                $menuItems[] = '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        '<b>Logout (' . Yii::$app->user->identity->username . ')</b>',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>';

                /*
                si esta logeado
                if(can tutor)
                else no tutor
                */
            }else{
                $menuItems[] = '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        '<b>Logout (' . Yii::$app->user->identity->username . ')</b>',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>';
            }
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ml-auto'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
    </header>

    <main role="main" class="flex-shrink-0 bg-white">
        <!-- <div class="mt-5 bg-secondary" style="height: 500px;"> -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <?= Html::img('@web/images/tuto1.png', ['alt' => 'Itsva', 'class' => 'd-block w-100', 'width' => '100%']); ?>
                    </div>
                    <div class="carousel-item">
                        <?= Html::img('@web/images/tuto2.png', ['alt' => 'Itsva', 'class' => 'd-block w-100', 'width' => '100%']); ?>
                    </div>
                    <div class="carousel-item">
                        <?= Html::img('@web/images/tuto3.png', ['alt' => 'Itsva', 'class' => 'd-block w-100', 'width' => '100%']); ?>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        <!-- </div> -->
        <div class="container"><!-- mt-5 -->
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            <p class="float-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>

</body>

</html>
<?php $this->endPage();
