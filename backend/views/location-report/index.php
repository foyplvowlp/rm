<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LocationReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'หน่วยงานที่รายงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-report-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('เพิ่มหน่วยงานที่รายงาน', ['value' => Url::to('?r=location-report/create'), 'title' => 'เพิ่มหน่วยงานที่รายงาน', 'class' => 'btn btn-success', 'id' => 'activity-create-link']); ?>
    </p>


    <?php
    Modal::begin([
        'id' => 'activity-modal',
        'header' => '<h4 class="modal-title">สาเหตุที่ชัดเจน</h4>',
        'size' => 'modal-lg',
        'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">ปิด</a>',
    ]);
    Modal::end();
    ?>


    <?php $this->registerJs('
        function init_click_handlers(){
            $("#activity-create-link").click(function(e) {
                    $.get(
                        "?r=location-report/create",
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("เพิ่มข้อมูล");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            $(".activity-view-link").click(function(e) {
                    var fID = $(this).closest("tr").data("key");
                    $.get(
                        "?r=location-report/view",
                        {
                            id: fID
                        },
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("เปิดดูข้อมูล");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            $(".activity-update-link").click(function(e) {
                    var fID = $(this).closest("tr").data("key");
                    $.get(
                        "?r=location-report/update",
                        {
                            id: fID
                        },
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("แก้ไขข้อมูล");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
        }
        init_click_handlers(); //first run
        $("#clear_pjax_id").on("pjax:success", function() {
          init_click_handlers(); //reactivate links in grid after pjax update
        });'); ?>


    <?php \yii\widgets\Pjax::begin(['id' => 'clear_pjax_id']); ?>
    <?=
    \kartik\grid\GridView::widget([
        //GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
            'enablePushState' => false,
            'options' => ['id' => 'UserGrid'],
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'location_name',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'จัดการ',
                'options' => ['style' => 'width:200px;'],
                //'buttonOptions' => ['class' => 'btn btn-default'],
                //'template' => '<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '#', [
                                    'class' => 'activity-view-link',
                                    'title' => 'เปิดดูข้อมูล',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#activity-modal',
                                    'data-id' => $key,
                                    'data-pjax' => '0',
                        ]);
                    },
                            'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                    'class' => 'activity-update-link',
                                    'title' => 'แก้ไขข้อมูล',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#activity-modal',
                                    'data-id' => $key,
                                    'data-pjax' => '0',
                        ]);
                    },
                        ]
                    ],
                ],
            ]);
            ?>
            <?php \yii\widgets\Pjax::end(); ?>

</div>
