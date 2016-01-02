<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 02/01/16
 * Time: 18:16
 */
use app\models\Category;

/** @var $model Category */

?>

<div class="paragraph">
    <h3><a href="index.php?r=category/view&id=<?= $model->id ?>"><?= $model->title ?></a></h3>
    <p><?= $model->description ?></p>
</div>