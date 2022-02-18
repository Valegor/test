<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Game;
use app\modules\admin\models\GameSearch;
use app\modules\admin\models\GameCard;
use app\modules\admin\models\Card;
use app\modules\admin\controllers\AppAdminController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GameController implements the CRUD actions for Game model.
 */
class GameController extends AppAdminController
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Game models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GameSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Game model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id)
        ]);
    }

    public function actionDeleteCard($id, $game_card_id)
    {

        $item = GameCard::findOne($game_card_id );
        $item->delete();
    

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);

    }


    public function actionDeleteAllCard($id)
    {

        // Yii::$app->db->createCommand()
        // ->delete(GameCard::tableName(), ['game_id' => $id], $params = [])
        // ->execute();

        GameCard::deleteAll(['game_id' => $id]);

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);

    }

    


    /**
     * Creates a new Game model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Game();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Game model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Game model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Game model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Game the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Game::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAddCard($id, $card_id)
    {

        $gamecard = GameCard::find()->where(['game_id' => $id, 'card_id' => $card_id])->asArray()->all();

        // echo '<pre>';
        // print_r($gamecard);
        // echo '</pre>';
        // echo (count($gamecard));

        if(count($gamecard) < 1){
            $card = Card::findOne($card_id);

            $game_card = new GameCard();
            $game_card->game_id = $id;
            $game_card->card_id = $card->id;
            $game_card->card_img = $card->img1;
            $game_card->card_name = $card->name;
            $game_card->card_category = $card->category;
            $game_card->save();
        }

        
        // $item = GameCard::findOne($game_card_id );
        // $item->delete();
        
    
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
}
