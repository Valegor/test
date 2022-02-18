<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\file\FileInput;

mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
?>


<?php

$img = '';

if (is_null($model->img) === true) 
    $img = 'cards/blank.jpg';
else 
    $img = $model->img;

?>

<?php
$aviables = array
(
    '0' => 'Черновик',
    '1' => 'Опубликован'
);

$score = array
(
    '1' => 'Плохо',
    '2' => 'Неудовлетворительно',
    '3' => 'Удовлетворительно',
    '4' => 'Хорошо',
    '5' => 'Отлично'
)

?>

<div class="feedback-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?php echo ' <hr> <b>Картинка: </b>' . $model->img . '<hr>' ?>

    <?= Html::img(Yii::$app->urlManager->createUrl($img)) ?>

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
        echo $form->field($model, 'body')->widget(CKEditor::class, [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some    CKEditor Options */]),
        ]);
    ?>

    <?= $form->field($model, 'aviable')->dropDownList($aviables) ?>

    <?= $form->field($model, 'score')->dropDownList($score) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
