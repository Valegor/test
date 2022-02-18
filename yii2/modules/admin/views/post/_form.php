<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\file\FileInput;

mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$categories = app\modules\admin\models\PostCategory::find()->all();
$data = yii\helpers\ArrayHelper::map($categories, 'id', 'category');
?>

<?php
    
    $img = '';

    if (is_null($model->imgage) === true) 
        $imgage = 'cards/blank.jpg';
    else 
        $imgage = $model->imgage;

?>

<?php
$users = app\modules\admin\models\User::find()->all();
$datausers = yii\helpers\ArrayHelper::map($users, 'id', 'username');
// echo '<pre>';
// print_r($datausers);
// echo '</pre>';

?>

<?php
$aviables = array
(
    '0' => 'Черновик',
    '1' => 'Опубликован'
)
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author_id')->dropDownList($datausers) ?>

    <?= $form->field($model, 'category_id')->dropDownList($data) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>


    <?php echo ' <hr> <b>Картинка 2: </b>' . $model->imgage . '<hr>' ?>

    <?= Html::img(Yii::$app->urlManager->createUrl($imgage)) ?>

    <?php
    echo $form->field($model, 'file')->widget(FileInput::class, [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showCaption' => false,
            'showUpload' => false,
        ],
    ]);
    ?>

    <?php
    // echo $form->field($model, 'body')->widget(CKEditor::class,[
    //     'editorOptions' => [
    //         'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
    //         'inline' => false, //по умолчанию false
    //     ],
    // ]);
    ?>

    <?php
        echo $form->field($model, 'body')->widget(CKEditor::class, [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some    CKEditor Options */]),
        ]);
    ?>

    <?= $form->field($model, 'aviable')->dropDownList($aviables) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
