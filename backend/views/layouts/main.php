<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use common\widgets\Alert;
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
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <?php
        NavBar::begin([
            'brandLabel' => 'SISTEMA DE CONTROL DE TUTORÍAS', //Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
            ],
        ]);

        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
        ];

        if (Yii::$app->user->isGuest && Yii::$app->user->can('tutor')) {
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            
            //COLOCAR MENSAJE DE QUE NO SE TIENE ACCESO

        } elseif(Yii::$app->user->can('admin')) {

            
            $menuItems[] = [
                'label' => 'Acceso', 'url' => ['site/index'],
                'options' => ['class' => 'dropdown'],
                'template' => '<a href="{url}" class="href_class">{label}</a>',
                'items' => [
                    ['label' => 'Usuarios', 'url' => ['/user/index']],
                    '<hr class="dropdown-divider">',
                    ['label'=> 'Asignación de acceso','url'=> ['/rbac/assignment']],
                    ['label'=> 'Roles','url'=> ['/rbac/role']],
                    ['label'=> 'Permisos','url'=> ['/rbac/permission']],
                    ['label'=> 'Rutas','url'=> ['/rbac/route']],
                    ['label'=> 'Reglas','url'=> ['/rbac/rule']],
                    
                ],
            ];

            /*
                                [
                        'label' => 'RBAC', 
                        'url' => ['site/index'],
                        'options' => ['class' => 'dropdown'],
                        'submenuTemplate' => '<a href="{url}" class="href_class">{label}</a>',
                        'items'=> [
                            ['label'=> 'Asignación de acceso','url'=> ['rbac/assignment']],
                            '<hr class="dropdown-divider">',
                            ['label'=> 'Roles','url'=> ['rbac/role']],
                            ['label'=> 'Permisos','url'=> ['rbac/permission']],
                            ['label'=> 'Rutas','url'=> ['rbac/route']],
                            ['label'=> 'Reglas','url'=> ['rbac/rule']],
                        ],
                    ],
             */
            
            $menuItems[] = [
                'label' => 'Grupos', 'url' => ['site/index'],
                'options' => ['class' => 'dropdown'],
                'template' => '<a href="{url}" class="href_class">{label}</a>',
                'items' => [
                    ['label' => 'Ciclos y periodos', 'url' => ['/ciclo-escolar/index']],
                    ['label' => 'Carreras', 'url' => ['/carreras/index']],
                    '<hr class="dropdown-divider">',
                    ['label' => 'Grupos Activos', 'url' => ['/grupo-master/index']],
                    ['label' => 'Grupo Letras', 'url' => ['/grupo-letra/index']],
                    '<hr class="dropdown-divider">',
                    ['label'=> 'Semestre','url'=> ['/semestre/index']],
                ],
            ];

            $menuItems[] = [
                'label' => 'Tutores', 'url' => ['site/index'],
                'options' => ['class' => 'dropdown'],
                'template' => '<a href="{url}" class="href_class">{label}</a>',
                'items' => [
                    ['label' => 'Tutores', 'url' => ['/tutor/index']],
                ],
            ];

            $menuItems[] = [
                'label' => 'Alumnos', 'url' => ['site/index'],
                'options' => ['class' => 'dropdown'],
                'template' => '<a href="{url}" class="href_class">{label}</a>',
                'items' => [
                    ['label' => 'Alumnos', 'url' => ['/alumno/index']],
                ],
            ];

            $menuItems[] = [
                'label' => 'Administración de tutorias', 'url' => ['site/index'],
                'options' => ['class' => 'dropdown'],
                'template' => '<a href="{url}" class="href_class">{label}</a>',
                'items' => [
                    //filtros -> select dependientes
                    ['label' => 'PAT', 'url' => ['/pat/index']],
                    '<hr class="dropdown-divider">',
                    ['label' => 'Criterios', 'url' => ['/criterios/index']],
                ],
            ];

            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    '<b><i class="bi bi-box-arrow-in-right"></i> Logout (' . Yii::$app->user->identity->username . ')</b>',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ml-auto'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container main-info">

            <!-- <img class="img-thumbnail" src="<?= dirname(dirname(dirname(__DIR__))).'\uploads\itsva.png'?>" alt=""> -->

            <?= Html::img('@web/images/itsva.png', ['alt'=>'Itsva', 'class'=>'img-thumbnail mb-2 mt-2 border-0', 'width'=>'50%']);?>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-left">&copy; <?= Html::encode('ITSVA') ?> <?= date('Y') ?></p>
            <p class="float-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
