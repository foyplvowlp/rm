<?php
/* @var $this yii\web\View */

//Yii::$app->request->get('id');
//print_r($id);
use dosamigos\gallery\Gallery;

$time = time();
?>

<div class="risk-pdf">
    <div class="container"><br /><br /><br /><br />

        <center>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <img src="../images/logo.png" alt="Smiley face" height="120" width="120">
        </center>
        <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>แบบฟอร์มรายงานความเสี่ยง รพ.เชียงคาน</b></h3>
        <p>ใบรายงานความเสี่ยงเลขที่ : <?= $model->id; ?></p>  
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>เหตุการณ์เกิดกับ :</td>
                    <td><?= $model->person->person_type; ?></td>
                </tr>
                <tr>
                    <td>HN :</td>
                    <td><?= $model->hn; ?></td>
                </tr>
                <tr>
                    <td>ชื่อ-สกุล :</td>
                    <td><?= $model->pname; ?><?= $model->fname; ?>   <?= $model->lname; ?></td>
                </tr>
                <tr>
                    <td>หน่วยงานต้นเหตุ  :</td>
                    <td><?= $model->locationRiks->location_name; ?></td>
                </tr>
                <tr>
                    <td>หน่วยงานที่เกี่ยวข้อง  :</td>
                    <td><?= $model->locationConnection->location_name; ?></td>
                </tr>
                <tr>
                    <td>หน่วยงานที่รายงาน  :</td>
                    <td><?= $model->locationReport->location_name; ?></td>
                </tr>
                <tr>
                    <td>วันที่เกิดเหตุ/เวลา :</td>
                    <td><?= Yii::$app->thaiFormatter->asDate($model->risk_date, 'full') .' เวลา '. Yii::$app->thaiFormatter->asTime($model->risk_date, 'medium') . ' น.'; ?></td>
                </tr>
                <tr>
                    <td>วันที่รายงาน/เวลา :</td>
                    <td><?= Yii::$app->thaiFormatter->asDate($model->risk_report, 'full') .' เวลา '. Yii::$app->thaiFormatter->asTime($model->risk_report,'medium') . ' น.'; ?></td>
                </tr>
                <tr>
                    <td>สรุปเหตุการณ์ :</td>
                    <td><?= $model->risk_summary; ?></td>
                </tr>
                <tr>
                    <td>ประเภท :</td>
                    <td><?= $model->type->type_name; ?></td>
                </tr>
                <tr>
                    <td>ประเภทย่อย :</td>
                    <td><?= $model->subType->sub_type_name; ?></td>
                </tr>
                <tr>
                    <td>ระดับ :</td>
                    <td><?= $model->level->level_name; ?></td>
                </tr>
                <tr>
                    <td>คลิกนิก :</td>
                    <td><?= $model->typeClinic->clinic_name; ?></td>
                </tr>
                <tr>
                    <td>การทบทวน :</td>
                    <td><?= $model->status->status_name; ?></td>
                </tr>
                <tr>
                    <td>สรุปการทบทวน :</td>
                    <td><?= $model->risk_review; ?></td>
                </tr>
                <tr>
                    <td>เอกสารทบทวน :</td>
                    <td><?= $model->listDownloadFiles('docs'); ?></td>
                </tr>
                <tr>
                    <td>รูปภาพ :</td>
                    <td><center>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?= Gallery::widget(['items' => $model->getThumbnails($model->ref, $model->risk_review)]); ?>
                    </div>
                </div>
            </center></td>
            </tr>
            </tbody>
        </table>
        <center>
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                วันที่พิมพ์ : <?= Yii::$app->thaiFormatter->asDate($model->risk_date, 'medium'); ?>
            </p> 
        </center>
    </div>
</div>