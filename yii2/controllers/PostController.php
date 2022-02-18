<?php

namespace app\controllers;

use app\models\Post;
use app\models\PostCategory;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class PostController extends \yii\web\Controller
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

    public function actionView($id)
    {
        $category = PostCategory::findOne($id);
        if(empty($category)){
            throw new NotFoundHttpException('Такой категории нет...');
        }

        //$products = Product::find()->where(['category_id' => $id])->all();

        $query = Post::find()->where(['category_id' => $id, 'aviable' => 1])->orderBy('updated_at DESC');;
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('view', compact('posts', 'category', 'pages'));
    }


}
