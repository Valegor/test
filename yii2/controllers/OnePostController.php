<?php

namespace app\controllers;

use app\models\Post;
use app\models\User;
use yii\web\NotFoundHttpException;

class OnePostController extends AppController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($id)
    {
        $post = Post::findOne($id);
        if(empty($post)){
            throw new NotFoundHttpException('Такой статьи нет...');
        }

        $author = User::find()->where(['id' => $post->author_id])->one();;

        return $this->render('view', compact('post', 'author'));
    }

}