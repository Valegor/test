<?php

namespace app\controllers;

use app\models\Game;
use app\models\GameCategory;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class GameController extends \yii\web\Controller
{

    public function actionIndex()
    {
        $query = Game::find()->where(['aviable' => 1])->orderBy('updated_at DESC');
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $games = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index', compact('games', 'pages'));
    
    }

    public function actionView($id)
    {

        $category = GameCategory::findOne($id);
        if(empty($category)){
            throw new NotFoundHttpException('Такой категории нет...');
        }

        //$products = Product::find()->where(['category_id' => $id])->all();

        $query = Game::find()->where(['category_id' => $id, 'aviable' => 1])->orderBy('updated_at DESC');
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $games = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('view', compact('games', 'category', 'pages'));

    }

}
