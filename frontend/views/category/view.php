<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $postsProvider common\models\Category */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content" class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php if(Yii::$app->user->can('updateCategory')): ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif ?>
        <?php if(Yii::$app->user->can('deleteCategory')): ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php endif ?>
    </p>


    <?= ListView::widget([
        'dataProvider' => $postsProvider,
        'itemView' => function($post) {
            return $this->render('post_row', [
                'model' => $post,
                'categoryNames' => ArrayHelper::getColumn($post->categories, 'title')
            ]);
        }
    ]); ?>

</div>
