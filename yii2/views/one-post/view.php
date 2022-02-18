<div class="sections_group">
                    <div id="post-181" class="post format-video has-post-thumbnail  category-motion category-photography tag-eclipse   no-title">
                        <div class="section section-post-header">
                            <div class="section_wrapper clearfix">
                                <!-- Posts Navigation -->
                                <!-- One full width row-->
                                <div class="column one post-nav">

                                </div>
                                <!-- Post Header-->
                                <!-- One full width row-->
                                <div class="column one post-header">
                                    <div class="title_wrapper">
                                        <div class="post-meta clearfix">
                                            <div class="author-date">
                                                <div class="desc">
                                                    <h1><?= $post->title ?></h1><span class="date"><i class="icon-clock"></i><?= Yii::$app->formatter->asDate($post->updated_at, 'yyyy-MM-dd') ?></span>
                                                </div></a>
                                            </div>
                                            <div class="category meta-categories">
                                                <span class="cat-btn"><?= $author->username ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Post Featured Element (image / video / gallery)-->
                                <!-- One full width row-->
                                <div class="column one single-photo-wrapper">

                                    <div class="image_frame scale-with-grid">
                                        <div class="image_wrapper">
                                            <div class="image_frame post-photo-wrapper scale-with-grid">
                                                <div class="image_wrapper">
                                                    <a href="#">
                                                        <div class="mask"></div><?= \yii\helpers\Html::img("@web/{$post->imgage}", ['width' => 500, 'height' => 649, 'class' => 'scale-with-grid wp-post-image']) ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Post Content-->
                        <div class="post-wrapper-content">
                            <div class="entry-content">
                                <div class="section the_content">
                                    <div class="section_wrapper">
                                        <div class="the_content_wrapper">
                                            <?= $post->subtitle ?>
                                        </div>
                                        <hr> 
                                        <div class="the_content_wrapper">
                                        <?= $post->body ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section section-post-footer">
                                <div class="section_wrapper clearfix">
                                    <!-- One full width row-->
                                    <div class="column one post-pager"></div>
                                </div>
                            </div>
                            <!--Author Info Area-->
                            <div class="section section-post-about">
                                <div class="section_wrapper clearfix">
                                    <!-- One full width row-->
                                    <div class="column one author-box">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Related posts area-->
                        <!-- Comments area-->
                    </div>
                </div>