<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use yii\widgets\Pjax;
?>

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




<!-- Widget Form end -->


                    <!-- form begin -->
                        <form id="contactform">
                            <div class="column one">
                                <label>ФИО:</label><span>
                                        <input type="text" name="name" id="name" size="40" aria-invalid="false" value="<?= $username ?>"/>
                                    </span>
                            </div>
                            <!-- One Third (1/3) Column -->
                            <div class="column one-third">
                                <label>E-mail:</label><span>
                                        <input type="email" name="email" id="email" size="150" aria-required="true" aria-invalid="false" value="<?= $email ?>" />
                                    </span>
                            </div>
                            <div class="column one-third">
                                <label>Телефон:</label><span>
                                        <input type="text" name="phone" id="phone" size="37" aria-required="true" aria-invalid="false" />
                                    </span>
                            </div>
                            <div class="column one">
                                <label>Укажите удобный способ связи:</label><span>
                                    <p><input name="perfect_connect" type="radio" value="Телефон" checked> Телефон</p>
                                    <p><input name="perfect_connect" type="radio" value="WhatsApp"> WhatsApp</p>
                                    <p><input name="perfect_connect" type="radio" value="Viber"> Viber</p>
                                    <p><input name="perfect_connect" type="radio" value="E-mail"> E-mail</p>
                                    </span>
                            </div>
                            <!-- One Third (1/3) Column -->
                            <div class="column one">
                                <label>Укажите цели игры:</label><span>
                                <textarea name="goals" id="goals" class="flv_style_38" rows="5" aria-invalid="false"></textarea></span>
                            </div>
                            <div class="column one">
                                <label>Опишите Ваши проблемы:</label><span>
                                <textarea name="problem" id="problem" class="flv_style_38" rows="10" aria-invalid="false"></textarea></span>
                            </div>
                            <div class="column one">
                                <input type="button" value="Отправить сообщение" id="submit" onClick="return check_values();">
                            </div>
                        </form>

<!-- form end -->


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>