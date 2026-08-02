<?php

use mdm\admin\AnimateAsset;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $routes [] */

$this->title = Yii::t('rbac-admin', 'Routes');
$this->params['breadcrumbs'][] = $this->title;

AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
    'routes' => $routes,
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="bi bi-arrow-repeat refresh-icon"></i>';

?>
<div class="row">
    <div class="col-sm-12">
        <div class="input-group">
            <input id="inp-route" type="text" class="form-control" placeholder="<?=Yii::t('rbac-admin', 'New route(s)');?>">
            <span class="input-group-btn">
                <?= Html::a('<i class="bi bi-plus-circle"></i>&nbsp;' . Yii::t('rbac-admin', 'Add'), ['create'], [
                    'class' => 'btn btn-success',
                    'id' => 'btn-new',
                ]);?>
            </span>
        </div>
    </div>
</div>
<p>&nbsp;</p>
<div class="row">
    <div class="col-sm-5">
        <div class="input-group">
            <input class="form-control search" data-target="available"
                   placeholder="<?=Yii::t('rbac-admin', 'Search for available');?>">
            <span class="input-group-btn">
                <?= Html::a('<i class="bi bi-arrow-repeat"></i>', ['refresh'], [
                    'class' => 'btn btn-secondary',
                    'id' => 'btn-refresh',
                    'onclick' => "$(this).find('i').addClass('spinner-border spinner-border-sm');", // Efek animasi saat diklik
                ]); ?>
            </span>
        </div>
        <select multiple size="20" class="form-control list" data-target="available" style="height: 400px;"></select>
    </div>
    <div class="col-sm-2">
        <div class="d-grid gap-2 mx-auto">
            <?=Html::a('&gt;&gt;' . $animateIcon . ' Assign', ['assign'], [
                'class' => 'btn btn-success btn-assign',
                'data-target' => 'available',
                'title' => Yii::t('rbac-admin', 'Assign'),
            ]);?>

            <?=Html::a('&lt;&lt;' . $animateIcon . ' Revoke', ['remove'], [
                'class' => 'btn btn-danger btn-assign',
                'data-target' => 'assigned',
                'title' => Yii::t('rbac-admin', 'Remove'),
            ]);?>
        </div>
    </div>
    <div class="col-sm-5">
        <input class="form-control search" data-target="assigned"
               placeholder="<?=Yii::t('rbac-admin', 'Search for assigned');?>">
        <select multiple size="20" class="form-control list" data-target="assigned" style="height: 400px;"></select>
    </div>
</div>
