<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
use miloschuman\highcharts\Highcharts;
$this->title = 'Tafhim';
?>

<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"><?= Html::encode($this->title) ?></h3>
<!-- END PAGE TITLE-->


<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <div class="portlet light ">

            <div class="portlet-body">

                                    <?php 


                                   if (empty($model)) {

                                        $pusat_pengajian = $total =0 ;
                                        $xAxis = $pusat_pengajian; 
                                        $yAxis = $total;

                                     # code...
                                   } else {

                                      foreach ($model as $key => $value) {
                                        $pusat_pengajian[] = $value['pusat_pengajian'];
                                        $total[] = (int)$value['total'];

                                        }
                                   }

                                        $xAxis = $pusat_pengajian; 
                                        $yAxis = $total;

                                    echo Highcharts::widget([
                                       'options' => [
                                          'title' => ['text' => 'Senarai Pelajar Mengikut Pusat Pengajian'],
                                          'chart' => [
                                                'type' => 'column',
                                            ],
                                          'xAxis' => [
                                             'categories' => $xAxis
                                          ],
                                          'yAxis' => [
                                             'title' => ['text' => 'Total']
                                          ],
                                          'plotOptions' => [
                                            'column' => [
                                                'stacking' => 'normal',
                                                'dataLabels' => [
                                                    'enabled' => true,

                                                ],
                                            ],
                                          ],

                                          'series' => [
                                             [
                                              'name' => 'Pusat Pengajian', 
                                              'colorByPoint' => true,
                                              'data' => $yAxis
                                             
                                             ],

                                          ]
                                       ]
                                    ]) ?>
            </div>

        </div>
    </div>
</div>




