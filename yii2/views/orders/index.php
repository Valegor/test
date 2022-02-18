<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
?>

<?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
        
<?php endif; ?>

<div class="items_group clearfix">
            <!-- One full width row-->
        </div>
    </div>
</div>
<div class="section flv_sections_20">
    <div class="section_wrapper clearfix">
        <div class="items_group clearfix">
            <!-- One Third (1/3) Column -->
            <div class="column one-third column_list">
                <div class="list_item lists_2 clearfix">
                    <div class="list_left list_icon">
                        <i class="icon-mail-line"></i>
                    </div>
                    <div class="list_right">
                    <div class="desc">
                        <span class="big flv_style_10">E-mail:</span>
                        <h4><a href="mailto:<?= Yii::$app->params['contactEmail']?>"><?= Yii::$app->params['contactEmail']?></a></h4>
                </div>
            </div>
            </div>
            </div>
            <!-- One Third (1/3) Column -->
            <div class="column one-third column_list">
            <div class="list_item lists_2 clearfix">
                    <div class="list_left list_icon">
                        <i class="icon-comment-line"></i>
                    </div>
                    <div class="list_right">
                        <div class="desc">
                            <span class="big flv_style_10">Позвоните нам</span>
                            <h4><a href="#">  <?= Yii::$app->params['contactPhone'] ?> </a></h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- One Third (1/3) Column -->
            <div class="column one-third column_list">
                <div class="list_item lists_2 clearfix">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="section section-border-top flv_sections_21">
    <div class="section_wrapper clearfix">
        <div class="items_group clearfix">
            <!-- One Third (1/3) Column -->
            <div class="column one-third column_column">
                <div class="column_attr">
                    <div class="flv_style_11">
                        <h2>Оставьте заявку на игру</h2>
                        <p>
                            <span class="big">
                                Мы обязетельно ответим!
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Two Third (2/3) Column -->



            <div class="column two-third column_column">
                <div class="column_attr">
                    <div id="contactWrapper">


<!-- Wiidget Form begin -->

<?php $form = ActiveForm::begin([
        'id' => 'my-form',
        'enableClientValidation' => true,
        // 'options' => [
        //     'class' => 'form-horizontal',
        //     'data-pjax' => false,
        // ],
        // 'fieldConfig' => [
        //     'template' => "{label} \n <div class='col-md-5'> {input} </div> \n <div class='col-md-5'> {hint} </div> \n <div class='col-md-5'> {error} </div>",
        //     'labelOptions' => ['class' => 'col-md-2 control-label'],
        // ]
    ]) ?>

    <?= $form->field($model, 'name')->hint('Заполните поле имя')->textInput(['placeholder' => 'Введите имя', 'value' =>$username]); ?>

    <?= $form->field($model, 'phone')->hint('Заполните поле телефон')->textInput(['placeholder' => 'Введите номер телефона', 'style'=>'width:250px']); ?>

    <?= $form->field($model, 'email')->input('email', ['placeholder' => 'Введите Email', 'value' =>$email, 'style'=>'width:250px']) ?>

    <?= $form->field($model, 'perfect_connect')->radioList(['Phone' => 'Телефон', 'E-mail' =>'E-mail', 'WhatsApp' =>'WhatsApp'], ['value'=>'Phone'], array('class' => 'i-checks'));?>

    <?= $form->field($model, 'goals')->textarea(['rows' => 7, 'placeholder' => 'Опишите цели игры']) ?>

    <?= $form->field($model, 'problem')->textarea(['rows' => 10, 'placeholder' => 'Опишите проблемы, которые Вы планируете решить в игре']) ?>

    <?= Html::submitButton('Отправить', ['class' => 'btn btn-default btn-block', 'style'=>'width:100px']) ?>

<?php ActiveForm::end() ?>

<!-- Widget Form end -->


<!-- form begin -->

<!-- form end -->


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>