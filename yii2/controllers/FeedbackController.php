<?php

namespace app\controllers;

use app\models\Feedback;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class FeedbackController extends \yii\web\Controller
{

    public function actionIndex()
    {
        $query = Feedback::find()->where(['aviable' => 1])->orderBy('updated_at DESC');
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 12, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index', compact('posts', 'pages'));
    
    }

}
