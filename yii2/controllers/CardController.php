<?php

namespace app\controllers;

use app\models\Card;
use app\models\Category;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class CardController extends \yii\web\Controller
{
    public function actionIndex()
    {
            //$posts = Post::find()->all();
            $query = Card::find();
            $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 12, 'forcePageParam' => false, 'pageSizeParam' => false]);
            $cards = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

            return $this->render('index', compact('cards', 'pages'));

    }

    public function actionView($id)
    {
        $category = Category::findOne($id);
        if(empty($category)){
            throw new NotFoundHttpException('Такой категории нет...');
        }

        //$products = Product::find()->where(['category_id' => $id])->all();

        $query = Card::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 12, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $cards = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('view', compact('cards', 'category', 'pages'));
    }

}
