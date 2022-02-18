<?php

namespace app\controllers;

use app\models\Game;
use app\models\GameCard;
use app\models\User;
use yii\web\NotFoundHttpException;

class OneGameController extends AppController
{

    public function actionView($id)
    {
        
        $game = Game::findOne($id);
        if(empty($game)){
            throw new NotFoundHttpException('Такой игры нет...');
        }

        $cards = GameCard::find()->where(['game_id' => $id])->all();
        
        $author = User::find()->where(['id' => $game->author_id])->one();

        return $this->render('view', compact('game', 'cards', 'author'));
    }

}