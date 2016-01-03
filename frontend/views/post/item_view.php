<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 02/01/16
 * Time: 18:16
 */
use app\models\Post;

/** @var $model Post */

?>

<div class="paragraph">
    <h3><a href="/post/view?id=<?= $model->id ?>"><?= $model->title ?></a></h3>
    <p><?= $model->body ?></p>
</div>