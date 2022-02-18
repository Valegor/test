<?php

namespace app\controllers;

use app\models\Post;
use app\models\PostCategory;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class HomeController extends AppController
{

    public function actionIndex()
    {
        $query = Post::find()->where(['aviable' => 1])->orderBy('updated_at DESC');
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index', compact('posts', 'pages'));
    }

}