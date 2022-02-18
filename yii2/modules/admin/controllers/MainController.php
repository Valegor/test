<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Card;
use app\modules\admin\models\Post;
use app\modules\admin\models\Category;
use app\modules\admin\models\Orders;
use app\modules\admin\models\Game;
use app\modules\admin\models\Feedback;
use app\modules\admin\models\Templates;
use app\modules\admin\models\TemplateAnswer;
use app\modules\admin\models\TemplateCategory;
use app\modules\admin\models\TemplateComment;

class MainController extends AppAdminController
{


    public function actionIndex()

    {
        $cards = Card::find()->count();
        $categoryes = Category::find()->count();
        $posts = Post::find()->count();
        $orders = Orders::find()->count();
        $new_orders = Orders::find()->where(['status' => 0])->count();
        $game = Game::find()->count();
        $feedback = Feedback::find()->count();
        $templates = Templates::find()->count();
        $template_answers = TemplateAnswer::find()->count();
        $template_category = TemplateCategory::find()->count();
        $template_comment = TemplateComment::find()->count();
        
        return $this->render('index', compact('cards', 'categoryes', 'posts', 'orders', 'new_orders', 'game', 'feedback', 'templates', 'template_answers', 'template_category', 'template_comment'));
    }

    public function actionTest()
    {
        return $this->render('test');
    }

}