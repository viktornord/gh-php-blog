<?php

use common\models\Category;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\redactor\widgets\Redactor;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
/* @var $category_names String[] */

$categories = ArrayHelper::map(Category::find()->where(['active' => true])->all(), 'id', 'title');
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->widget(Redactor::className()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?= $form->field($model, 'categories_id')->widget(Select2::classname(), [
        'data' => $categories,
        'options' => [
            'placeholder' => 'Choose categories ...',
            'multiple' => 'true'
        ]
    ])->label('Categories') ?>

    <?php ActiveForm::end(); ?>

</div>
