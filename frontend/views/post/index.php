<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content" class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(Yii::$app->user->can('createPost')): ?>
    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php endif ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => function($post) {
            return $this->render('post_row', [
                'model' => $post,
                'categoryNames' => ArrayHelper::getColumn($post->categories, 'title')
            ]);
        }
    ]); ?>

</div>
