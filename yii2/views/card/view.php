                    <div class="items_group clearfix">
                                    <!-- One full width row-->
                                    <div class="column one column_column">
                                        <div class="column_attr">

                                            <!-- Image Gallery-->
                                            <div id='gallery-1' class='gallery galleryid-622 gallery-columns-4 gallery-size-thumbnail '>
                                                <!-- Gallery item -->
                                                <h3><?= $category->name ?></h3>

                                                <?php foreach($cards as $card): ?>

                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon landscape'>
                                                        <!-- <img width="300" height="466" src="images/card.jpg" class="attachment-thumbnail" /> -->
                                                        <?= \yii\helpers\Html::img("@web/{$card->img1}") ?>
                                                </dt>
                                                    <dd></dd>
                                                </dl>
                                              
                                                <?php endforeach; ?>  

                                                <br class="flv_style_25" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
 <hr>                               

 <div class="column one pager_wrapper">
                            <!-- Navigation Area -->
                            <div class="pager">
                                <!-- <div class="pages"> -->
        <?= \yii\widgets\LinkPager::widget([
                        'pagination' => $pages,
                        // 'nextPageCssClass' => 'next test',
//                        'maxButtonCount' => 3,
        ]) ?>
<!-- </div> -->
</div>
</div>
<hr>