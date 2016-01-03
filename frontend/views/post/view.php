<?php

use app\models\Comment;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content" class="post-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <h2><?= Html::encode($model->title) ?></h2>
    <p><?= $model->body ?></p>
    <h5>Comments</h5>
    <?= ListView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query' => Comment::find()->where(['post_id' => $model->id]),
        ]),
        'itemView' => function($comment) {
            return $this->render('comment_row', [
                'model' => $comment,
                'userName' => User::findOne($comment->author_id)->username
            ]);
        }
    ]); ?>
    <?php if(!Yii::$app->user->isGuest): ?>
        <h5>Leave your comment</h5>
        <?php
            $comment = new Comment();
            $comment->post_id = $model->id;
        ?>
        <?= $this->render('../comment/_form', [
            'model' => $comment,
        ]) ?>
    <?php endif ?>
</div>
