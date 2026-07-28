<?php

use app\widgets\SilolaGridView as SilolaGridViewAlias;
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
    SilolaGridViewAlias::widget([
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
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn(['view', 'activate', 'delete']),
                'buttons' => [
                    'activate' => function($url, $model) {
                        if ($model->status == 10) {
                            return '';
                        }
                        $options = [
                            'title' => Yii::t('rbac-admin', ''),
                            'aria-label' => Yii::t('rbac-admin', 'Activate'),
                            'data-confirm' => Yii::t('rbac-admin', 'Are you sure you want to activate this user?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="bi bi-check"></span>', $url, $options);
                    }
                ]
            ],
        ]]);
        ?>
</div>
