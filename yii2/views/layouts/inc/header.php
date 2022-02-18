<?php

    use yii\helpers\Url;
    use app\components\LogoutWidget;
    use yii\helpers\Html;
    
    if(!isset($active)){
        $active = 0;
    };
    
    $cards = 'card';
    $posts = 'post';
    $games = 'game';
    $feedback = 'feedback';
    $orders = 'orders';
    $about = 'about';

    $class = 'current_page_item';

    $active = Yii::$app->controller->id;

?>

<div id="Header_wrapper">
            <!-- Header -->
            <header id="Header">
                <!-- Header Top -  Info Area -->
                <!-- Header -  Logo and Menu area -->
                <div id="Top_bar">
                    <div class="container">
                        <div class="column one">
                            <div class="top_bar_left clearfix">
                                <!-- Logo-->
                                <div class="logo">
                                    <a id="logo" href="<?= Url::to(['/']) ?>"> <?= Html::img('@web/images/logo1.png') ?></a>
                                </div>
                                <!-- Main menu-->
                                <div class="menu_wrapper">
                                    <nav id="menu">
                                        <ul id="menu-main-menu" class="menu">
                                            <li class="<?php if (strcmp($active, $cards) === 0) echo ($class) ?>">
                                                <a href="<?= \yii\helpers\Url::to(['/card/view', 'id' => 5]) ?>"><span>Примеры карт</span></a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="<?= \yii\helpers\Url::to(['card/view', 'id' => '28']) ?>"><span>Цели программ</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= \yii\helpers\Url::to(['card/view', 'id' => '24']) ?>"><span>Ресурсы</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= \yii\helpers\Url::to(['card/view', 'id' => '26']) ?>"><span>Тренажерный зал</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= \yii\helpers\Url::to(['card/view', 'id' => '25']) ?>"><span>Свободные веса</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= \yii\helpers\Url::to(['card/view', 'id' => '11']) ?>"><span>Гимнастика</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= \yii\helpers\Url::to(['card/view', 'id' => '23']) ?>"><span>Растяжка</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= \yii\helpers\Url::to(['card/view', 'id' => '10']) ?>"><span>Виды фитнеса</span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="<?php if (strcmp($active, $posts) === 0) echo ($class) ?>">
                                            <?= \app\components\MenuWidget::widget([
                                                    'tpl' => 'select',
                                            ])?>
                                            </li>
                                            <li class="<?php if (strcmp($active, $games) === 0) echo ($class) ?>">
                                            <?= \app\components\GameCategoryWidget::widget([
                                                    'tpl' => 'select',
                                            ])?>
                                            </li>
                                            <!-- <li>
                                                <a href="#l"><span>Blog</span></a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="#"><span>Recen Post</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><span>Archive Post</span></a>
                                                    </li>
                                                </ul>
                                            </li> -->
                                            <?php if(Yii::$app->params['showFeedback'] === 1): ?>
                                                <li class="<?php if (strcmp($active, $feedback) === 0) echo ($class) ?>">
                                                    <a href="<?= Url::to(['/feedback/index']) ?>"><span>Отзывы</span></a>
                                                </class=>
                                            <?php endif; ?>
                                            <li class="<?php if (strcmp($active, $orders) === 0) echo ($class) ?>">
                                                <a href="<?= Url::to(['/orders/index']) ?>"><span>Отправить заявку</span></a>
                                            </li>
                                            <li class="<?php if (strcmp($active, $about) === 0) echo ($class) ?>">
                                                <a href="<?= Url::to(['/about/index']) ?>"><span>О проекте</span></a>
                                            </li>
                                            <?php
                                    if (Yii::$app->user->isGuest) {

                                    $menuItem = '                                            <li>
                                        <a href="#l">' . \yii\helpers\Html::img("@web/images/user.png") . 'LOGIN</a>
                                        <ul class="sub-menu">
                                        <li><a href="' . Url::to(['/site/login']). '">Вход</a></li>
                                        <li><a href="' . Url::to(['/site/signup']). '">Регистрация</a></li>
                                        </ul>
                                    </li>
                                    ';} else if (\Yii::$app->user->identity->id === (int)(Yii::$app->params['adminId'])) {
                                        $menuItem = '
                                <li class="dropdown">  
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">' . \yii\helpers\Html::img("@web/images/user.png") . '  ' . Yii::$app->user->identity->username . '<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="' . Url::to(['/admin/main/index']). '">Панель управления</a></li>
                                        <li>'.  LogoutWidget::widget() . '</li>
                                    </ul>
                                    ';
                                    } else {
                                        $menuItem = '
                                        <li class="dropdown">  
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">' . \yii\helpers\Html::img("@web/images/user.png") . '  ' . Yii::$app->user->identity->username . '<span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>'.  LogoutWidget::widget() . '</li>
                                            </ul>
                                            ';

                                    };
                                    echo $menuItem;
?>