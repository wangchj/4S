<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-col" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="color:#555">Steve Jobs Chronicle</a>
            </div>

            <div id="nav-col" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php
                        $contr = Yii::$app->controller->id;
                        $route = Yii::$app->controller->route;
                    ?>
                    <li class="<?=$route === 'site/timeline' ? 'active' : ''?>"><a href="<?=Url::to(['site/index'])?>">Timeline</a></li>
                    <li class="<?=$route === 'site/references' ? 'active' : ''?>"><a href="<?=Url::to(['site/references'])?>">References</a></li>
                </ul>
            </div>
        </div><!-- container -->
    </nav>

    <div class="container">
        <?= $content ?>
    </div>

</div><!-- wrap -->

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
