<?php
    // use Yii;
    use app\assets\AppAsset;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use app\components\LogoutWidget;
    AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="<?= Yii::$app->language ?>" class="h-100" class="no-js">
<!--<![endif]-->

<head>
    

    <!-- Basic Page Needs -->
    <meta charset="<?= Yii::$app->charset ?>">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.ico">



    <?php $this->head() ?>

</head>

<body class="color-blue layout-full-width header-modern sticky-header sticky-white">
<?php $this->beginBody() ?>
    <!-- Hidden Top Area -->

    <!-- Main Theme Wrapper -->
    <div id="Wrapper">
        <!-- Header Wrapper -->
        <?= $this->render('/layouts/inc/header') ?>


                                        </ul>
                                    </nav><a class="responsive-menu-toggle" href="#"><i class="icon-menu"></i></a>
                                </div>
                                <!-- Secondary menu area - only for certain pages -->
                                <!-- Banner area - only for certain pages-->
                                <div class="banner_wrapper">
                                </div>
                                <!-- Header Searchform area-->
                                <div class="search_wrapper">
                                    <form method="get" action="#">
                                        <i class="icon_search icon-search"></i><a href="#" class="icon_close"><i class="icon-cancel"></i></a>
                                        <input type="text" class="field" name="s" placeholder="Enter your search" />
                                        <input type="submit" class="submit flv_disp_none" value="" />
                                    </form>
                                </div>
                            </div>
                            <div class="top_bar_right">
                                <div class="top_bar_right_wrapper">
                                    <!-- Shopping cart icon-->
                                    <a id="search_button" href="#"><i class="icon-search"></i></a>
                                    <!--wpml flags selector-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Revolution slider area-->

            </header>
        </div>
        <!-- Main Content -->
        <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="content_wrapper clearfix">
                    <div class="sections_group">
                        <div class="extra_content">

                        </div>
                        <div class="section">
                            <div class="section_wrapper clearfix">


                                <?= $content ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Footer-->
        <?= $this->render('/layouts/inc/footer') ?>

    </div>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>