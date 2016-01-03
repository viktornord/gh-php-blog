<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 02/01/16
 * Time: 18:16
 */
use app\models\Comment;

/** @var $model Comment */
/** @var String $userName */
?>

<div class="paragraph">
    <b><?= $userName ?></b>
    <p><?= $model->body ?></p>
</div>