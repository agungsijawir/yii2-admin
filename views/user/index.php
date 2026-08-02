<?php

use app\widgets\SilolaDataActionColumnWidget;
use app\widgets\SilolaGridView;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel mdm\admin\models\searchs\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rbac-admin', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">


            <?=
            SilolaGridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'username',
                    'email:email',
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function($model) {
                            return $model->status == 0 ? '<span class="badge bg-danger">Non-Aktif</span>': '<span class="badge bg-success">Aktif</span>';
                        },
                        'filter' => [
                            0 => 'Non-Aktif',
                            10 => 'Aktif'
                        ]
                    ],
                    [
                        'class' => SilolaDataActionColumnWidget::class,
                        'template' => Helper::filterActionColumn(['view', 'activate', 'delete']),
                    ],
                ]]);
            ?>

</div>
