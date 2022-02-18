<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\file\FileInput;

mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Card */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
    $categories = app\modules\admin\models\Category::find()->all();
    $data = yii\helpers\ArrayHelper::map($categories, 'id', 'name');
?>

<?php
    
    $img_1 = '';

    if (is_null($model->img1) === true) 
        $img_1 = 'cards/blank.jpg';
    else 
        $img_1 = $model->img1;

    $img_2 = '';

    if (is_null($model->img2) === true) 
        $img_2 = 'cards/blank.jpg';
    else 
        $img_2 = $model->img2;

    $img_3 = '';

    if (is_null($model->backimg) === true) 
        $img_3 = 'cards/blank.jpg';
    else 
        $img_3 = $model->backimg;    


    // echo '<pre>';
    // print_r($img_1);
    // echo '</pre>';

?>

<div class="card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'category_id')->dropDownList($data) ?>

    <?php echo ' <hr> <b>Картинка 1: </b>' . $model->img1 . '<hr>' ?>

    <?= Html::img(Yii::$app->urlManager->createUrl($img_1)) ?>

    <?php
    echo $form->field($model, 'file_img1')->widget(FileInput::class, [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showCaption' => false,
            'showUpload' => false,
        ],
    ]);
    ?>

    <?php echo ' <hr> <b>Картинка 2: </b>' . $model->img2 . '<hr>' ?>

    <?= Html::img(Yii::$app->urlManager->createUrl($img_2)) ?>

    <?php
        echo $form->field($model, 'file_img2')->widget(FileInput::class, [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'showCaption' => false,
                'showUpload' => false,
            ],
        ]);
    ?>

    <?php echo ' <hr> <b>Картинка 3: </b>' . $model->backimg . '<hr>' ?>

    <?= Html::img(Yii::$app->urlManager->createUrl($img_3)) ?>

    <?php
        echo $form->field($model, 'file_img3')->widget(FileInput::class, [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'showCaption' => false,
                'showUpload' => false,
            ],
        ]);
    ?>

    <?php
        echo $form->field($model, 'notes')->widget(CKEditor::class, [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some    CKEditor Options */]),
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
