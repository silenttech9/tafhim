<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Menu;
use yii\bootstrap\Modal;
use kartik\growl\Growl;

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
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-md">
            
<?php $this->beginBody() ?>
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">

                    <a href="<?php echo Yii::$app->request->baseUrl; ?>">
                        <label class="logo-default" style="font-size:34px;margin-top:3px;color:#fff;">TAFHIM</label>
     
                         </a>

                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->



                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="<?php echo Yii::$app->request->baseUrl; ?>/theme/assets/layouts/layout/img/avatar.png" />
                                <span class="username username-hide-on-mobile"> <?= Yii::$app->user->identity->username ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <?= Html::a('<i class="icon-key"></i> Keluar', ['site/logout'],['data-method'=>'post']) ?>
         
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->

                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->


                        <?php


                        echo Menu::widget([
                            'items' => [
                                ['label' => '<i class="icon-home"></i><span class="title">Utama</span>', 'url' => ['site/index']],
                                ['label' => '',
                                    'options'=>['class'=>'nav-item'],
                                    'template' => '<a href="javascript:;" class="nav-link nav-toggle"><i class="icon-settings"></i><span class="title">Tetapan</span><span class="arrow"></span></a>',
                                    'items' => [
                                        ['label' => 'Pusat Pengajian / Kelas', 'url' => ['/lookup-pusat-pengajian/index']],
                                        ['label' => 'Pendapatan', 'url' => ['/lookup-pendapatan/index']],

                                    ]
                                ],
                                ['label' => '<h3 class="uppercase">HUMAN RESOURCES</h3>',
                                    'options'=>['class'=>'heading'],
                                ],
                                ['label' => '',
                                    'options'=>['class'=>'nav-item'],
                                    'template' => '<a href="javascript:;" class="nav-link nav-toggle"><i class="icon-users"></i><span class="title">Pengurusan Kakitangan</span><span class="arrow"></span></a>',
                                    'items' => [
                                        ['label' => 'Maklumat Kakitangan', 'url' => ['/maklumat-kakitangan/index']],
                                        ['label' => 'Maklumat Berhenti', 'url' => ['/maklumat-kakitangan/resign']],
                                        ['label' => 'Surat Tawaran', 'url' => ['/maklumat-kakitangan/surat']],
                                        [
                                            'label' => '',
                                            'options'=>['class'=>'nav-item'],
                                            'template' => '<a href="javascript:;" class="nav-link nav-toggle">Pengurusan Cuti<span class="arrow"></span></a>',
                                            'items' => [
                                                ['label' => 'Maklumat Cuti', 'url' => ['maklumat-cuti/index']],
                                                ['label' => 'Laporan Cuti', 'url' => ['maklumat-cuti/laporan_cuti']],
                                            ]
                                        ],
                                    ]
                                ],
                                ['label' => '',
                                    'options'=>['class'=>'nav-item'],
                                    'template' => '<a href="javascript:;" class="nav-link nav-toggle"><i class="icon-user"></i><span class="title">Pengurusan Pelajar</span><span class="arrow"></span></a>',
                                    'items' => [
                                        [
                                            'label' => '',
                                            'options'=>['class'=>'nav-item'],
                                            'template' => '<a href="javascript:;" class="nav-link nav-toggle">Pentadbiran<span class="arrow"></span></a>',
                                            'items' => [
                                                ['label' => 'Senarai Pelajar', 'url' => ['/maklumat-pelajar-penjaga/index']],
                                                ['label' => 'Pelajar Pending', 'url' => ['/maklumat-pelajar-penjaga/pending']],
                                                ['label' => 'Pelajar Mengikut Tahfiz', 'url' => ['/maklumat-pelajar-penjaga/tahfiz']],

                                            ]

                                        ],
                                        [
                                            'label' => '',
                                            'options'=>['class'=>'nav-item'],
                                            'template' => '<a href="javascript:;" class="nav-link nav-toggle">Kewangan<span class="arrow"></span></a>',
                                            'items' => [
                                                ['label' => 'Yuran Pendaftaran', 'url' => ['/yuran-daftar/yurandaftar']],
                                                ['label' => 'Yuran Bulanan', 'url' => ['/#']],
                                                ['label' => 'Rekod Yuran Pelajar', 'url' => ['/#']],
                                                // ['label' => 'Yuran Pendaftaran', 'url' => ['/maklumat-pelajar-penjaga/yuran']],
                                                // ['label' => 'Rekord Yuran Pelajar', 'url' => ['/maklumat-pelajar-penjaga/rekod_yuran']],
                            
                                                
                                            ]

                                        ],


                                    ]
                                ],
                                ['label' => '<h3 class="uppercase">PAYROLL</h3>',
                                    'options'=>['class'=>'heading'],
                                ],
                                ['label' => '',
                                    'options'=>['class'=>'nav-item'],
                                    'template' => '<a href="javascript:;" class="nav-link nav-toggle"><i class="icon-wallet"></i><span class="title">Pengurusan Gaji</span><span class="arrow"></span></a>',
                                    'items' => [
                                                ['label' => 'Maklumat Kakitangan', 'url' => ['pay-slip/pengurusan_gaji']],
                                                [
                                                    'label' => '',
                                                    'options'=>['class'=>'nav-item'],
                                                    'template' => '<a href="javascript:;" class="nav-link nav-toggle">Slip Gaji<span class="arrow"></span></a>',
                                                    'items' => [
                                                        ['label' => 'Kakitangan Aktif', 'url' => ['pay-slip/proses_gaji']],
                                                        ['label' => 'Kakitangan Tidak Aktif', 'url' => ['/pay-slip/payslip_tidak_aktif']],
                                                    ]

                                                ],
                                                ['label' => 'Jana Gaji Bulan Semasa', 'url' => ['pay-slip/jana_payslip']],

                                    ]
                                ],
                                ['label' => '',
                                    'options'=>['class'=>'nav-item'],
                                    'template' => '<a href="javascript:;" class="nav-link nav-toggle"><i class="icon-briefcase"></i><span class="title">Laporan Kewangan</span><span class="arrow"></span></a>',
                                    'items' => [
                                                ['label' => 'Laporan Gaji Bersih', 'url' => ['pay-slip/laporan_gaji']],
                                                ['label' => 'Laporan EPF', 'url' => ['pay-slip/laporan_epf']],
                                                ['label' => 'Laporan SOCSO', 'url' => ['pay-slip/laporan_socso']],
                                                ['label' => 'Laporan Tabung Kebajikan', 'url' => ['pay-slip/laporan_tabung_kebajikan']],
                                                ['label' => 'Laporan Tabung Guru', 'url' => ['pay-slip/laporan_tabung_guru']],
                                                ['label' => 'Laporan CTG', 'url' => ['pay-slip/laporan_ctg']],
                                                ['label' => 'Laporan Sewa Rumah', 'url' => ['pay-slip/laporan_sewa']],
                                                ['label' => 'Laporan KKSK', 'url' => ['pay-slip/laporan_kksk']],
                                                ['label' => 'Laporan Tabung Haji', 'url' => ['pay-slip/laporan_tbghaji']],
                                                ['label' => 'Laporan Bank', 'url' => ['pay-slip/laporan_bank']],
                                    ]
                                ],


                                


                            ],
                            'activateParents'=>true,
                            'encodeLabels' => false,
                            'options' => [
                                            'id' => 'menu',
                                            'class' => 'page-sidebar-menu  page-header-fixed',
                                            'data-keep-expanded' => 'false',
                                            'data-auto-scroll' => 'true',
                                            'data-slide-speed' => '200',
                                        ],
                            'itemOptions'=> ['class' => 'nav-item'],
                            'submenuTemplate' => "\n<ul class='sub-menu' >\n{items}\n</ul>\n",
                            //array('id'=>'item_id', 'class'=>'item_class', 'style'=>''),


                            //'submenuTemplate' => "\n<ul class='dropdown-menu pull-right' role='menu'>\n{items}\n</ul>\n",
                        ]);
                        ?>




                    <!-- END SIDEBAR MENU -->

                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
              
                        <?= Breadcrumbs::widget([
                                'homeLink' => ['label' => 'Utama','url' => Yii::$app->homeUrl,],
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                'itemTemplate' => '<li>{link}<i class="fa fa-circle"></i></li>',
                                'options' => [
                                    'class' => 'page-breadcrumb'
                                ]
                        ]) ?>

                        <div class="page-toolbar">
                            <div id="tarikh" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Tarikh">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase"><?= date('M d,Y') ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BAR -->

                    <?= $content ?>



                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->




           
        </div>
        <!-- END CONTAINER -->

<?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
            <?php
            echo Growl::widget([
                'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
                'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
                'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
                'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
                'showSeparator' => true,
                'options' => (!empty($message['options'])) ? $message['options'] : 'danger',
                // 'progressBarOptions' => (!empty($message['progressBarOptions'])) ? $message['progressBarOptions'] : 'progress-bar-info',
                // 'progressContainerOptions'=> (!empty($message['progressContainerOptions'])) ? $message['progressContainerOptions'] : 'progress-striped',
                'delay' => 1, //This delay is how long before the message shows
                'pluginOptions' => [
                    'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000, //This delay is how long the message shows for
                    'offset'=>['x'=>20,'y'=>100],
                    'animate' => [
                        'enter'=> 'animated fadeInRight',
                        'exit'=> 'animated fadeOutRight'
                    ],
                    'showProgressbar' => false,
                    'placement' => [
                        'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                        'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
                    ]
                ]
            ]);
            ?>
        <?php endforeach; ?>

<?php $this->endBody() ?>
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> <?= date('Y')?> &copy; TAFHIM - Human Resource & Payroll System.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

</body>
</html>
<?php 


Modal::begin([
    'header' =>'Tafhim',
    'id' => 'modal',
    'size' => 'modal-lg',
    'clientOptions' => ['backdrop' => false, 'keyboard' => TRUE],
    'options' => [
        'tabindex' => false // important for Select2 to work properly
    ],

]);

echo "<div id='modalContent'></div>";
Modal::end();



$this->endPage() ?>
