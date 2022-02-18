<?php

    use yii\helpers\Url;

?>

<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
        <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">   
        </div>
        <div class="pull-left info">
            <a href="<?=  Url::to(['/admin']) ?>"><p> <?= \Yii::$app->user->identity->username  ?> </p></a>
            <!-- Status -->
            <a href="<?=  Url::to(['/admin']) ?>"><i class="fa fa-circle text-success"></i><?php Yii::$app->user->identity->username ?></a>
        </div>
    </div>

    <!-- search form (Optional) -->

    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->

        <li class="active"><a href="<?= Url::to(['/admin/orders']) ?>"><i class="fa fa-link"></i> <span>Orders</span></a></li>



        <li class="treeview">
            <a href="<?= Url::to(['/admin/post']) ?>"><i class="fa fa-link"></i> <span>Posts</span>
                <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?= Url::to(['/admin/post']) ?>">Posts</a></li>
                <li><a href="<?= Url::to(['/admin/post-category']) ?>">Posts Category</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="<?= Url::to(['/admin/template']) ?>"><i class="fa fa-link"></i> <span>Template</span>
                <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?= Url::to(['/admin/template']) ?>">Template</a></li>
                <li><a href="<?= Url::to(['/admin/template-category']) ?>">Template Category</a></li>
                <li><a href="<?= Url::to(['/admin/template-answer']) ?>">Template Answer</a></li>
                <li><a href="<?= Url::to(['/admin/template-comment']) ?>">Template Comment</a></li>
            </ul>
        </li>


        <li class="treeview">
            <a href="<?= Url::to(['/admin/card']) ?>"><i class="fa fa-link"></i> <span>Cards</span>
                <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
            </a>
            <ul class="treeview-menu">
            <li><a href=<li><a href="<?= Url::to(['/admin/card']) ?>">Cards</a></li>">Posts</a></li>
                <li><a href="<?= Url::to(['/admin/category']) ?>">Cards Category</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="<?= Url::to(['/admin/game']) ?>"><i class="fa fa-link"></i> <span>Games</span>
                <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?= Url::to(['/admin/game']) ?>">Games</a></li>
                <li><a href="<?= Url::to(['/admin/game-category']) ?>">Games Category</a></li>
                <li><a href="<?= Url::to(['/admin/game-card']) ?>">Game Card</a></li>
            </ul>
        </li>

        <li class="active"><a href="<?= Url::to(['/admin/gamers']) ?>"><i class="fa fa-link"></i> <span>Gamers</span></a></li>

        <li class="active"><a href="<?= Url::to(['/admin/feedback']) ?>"><i class="fa fa-link"></i> <span>Feedback</span></a></li>

        <li class="active"><a href="<?= Url::to(['/admin/user']) ?>"><i class="fa fa-link"></i> <span>Users</span></a></li>

    </ul>
    <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>