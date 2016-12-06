<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAssetSignup;
use yii\widgets\Menu;

AppAssetSignup::register($this);
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
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-full-width page-md">
<?php $this->beginBody() ?>
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>">
                        <img src="<?php echo Yii::$app->request->baseUrl; ?>/theme/assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
                </div>


            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">



            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <div class="portlet light bordered">

                        <img src="<?php echo Yii::$app->request->baseUrl; ?>/image/banner.png"  style="height: 190px;width: 90%;padding-left: 100px;" class="banner"/>
                        
					   
					</div>
                    <?= $content ?>


                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->


        </div>
        <!-- END CONTAINER -->


<?php $this->endBody() ?>
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> <?= date('Y')?> &copy; TAFHIM - Human Resource & Payroll System.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->

</body>
</html>
<?php $this->endPage() ?>
