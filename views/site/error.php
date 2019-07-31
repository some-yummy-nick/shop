<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use yii\helpers\Html;
use app\assets\ErrorAsset;

ErrorAsset::register($this);

$this->title = $name;
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
    <?php
    $this->registerJsFile('js/html5shiv.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9'])
    ?>

</head>
<body>
<?php $this->beginBody() ?>
<div class="site-error">
    <div class="container text-center">
        <div class="logo-404">
            <a href="<?= \yii\helpers\Url::home() ?>">
                <?= Html::img("@web/images/home/logo.png", ['alt' => 'E-SHOPPER']) ?>
            </a>
        </div>
        <h1><?= Html::encode($this->title) ?></h1>

        <div class="content-404">
            <img src="/images/404/404.png" class="img-responsive" alt=""/>
            <h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
            <div>
                <?= nl2br(Html::encode($message)) ?>
            </div>
            <p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
            <h2>
                <a href="<?= \yii\helpers\Url::home() ?>">Bring me back Home</a>
            </h2>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
