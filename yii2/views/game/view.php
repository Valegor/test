<div class="column one column_blog">
                    <div class="blog_wrapper isotope_wrapper">

                        <div class="posts_group lm_wrapper classic">

                        <div><h3><?= $category->category ?></h3></div>

                        <?php if(!empty($games)): ?>

                            <?php foreach($games as $game): ?>

                                <div class="post format-standard has-post-thumbnail  category-motion category-photography tag-eclipse tag-grid tag-mysql post-item isotope-item clearfix">
                                    <div class="date_label">
                                        <?= Yii::$app->formatter->asDate($game->updated_at, 'yyyy-MM-dd') ?>
                                    </div>
                                    <div class="image_frame post-photo-wrapper scale-with-grid">
                                        <div class="image_wrapper">
                                            <a href="#">
                                                <div class="mask"></div> <?= \yii\helpers\Html::img("@web/{$game->img}", ['width' => 500, 'height' => 649, 'class' => 'scale-with-grid wp-post-image']) ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-desc-wrapper">
                                        <div class="post-desc">
                                            <div class="post-meta clearfix">
                                                <div class="author-date">
                                                                </span><span class="date"><span></span><i class="icon-clock"></i><?= Yii::$app->formatter->asDate($game->updated_at, 'yyyy-MM-dd') ?></span>
                                                </div>
                                            </div>
                                            <div class="post-title">
                                                <h2 class="entry-title"><a href="<?= \yii\helpers\Url::to(['one-game/view', 'id' => $game->id]) ?>"> <?= $game->name ?> </a></h2>
                                            </div>
                                            <div class="post-excerpt">
                                                <span class="big"><?= $game->subtitle ?></span>
                                            </div>
                                            <div class="post-footer">
                                                <div class="post-links">
                                                <a href="<?= \yii\helpers\Url::to(['one-game/view', 'id' => $game->id]) ?>" class="post-more">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?> 
                        </div>

                        <!-- One full width row-->
        <div class="column one pager_wrapper">
            <div class="pager">
                <?= \yii\widgets\LinkPager::widget([
                        'pagination' => $pages,
                        // 'nextPageCssClass' => 'next test',
                        // 'maxButtonCount' => 3,
                ]) ?>
            </div>
        </div>

        <?php else: ?>
                <div>
                    <h6>Здесь пока нет записей...</h6>
                </div>
        <?php endif; ?>