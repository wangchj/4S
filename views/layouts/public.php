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
                    <li class="<?=$route === 'site/timeline' ? 'active' : ''?>"><a href="<?=Url::to(['site/timeline', 'start'=>1935, 'end'=>1970])?>">Timeline</a></li>
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
    </div>
</footer>

<?php $this->endBody() ?>

<?php if(YII_ENV !== 'dev'):?>
	<script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-48945915-5', 'auto');
        ga('send', 'pageview');
    </script>
<?php endif;?>

</body>
</html>
<?php $this->endPage() ?>
