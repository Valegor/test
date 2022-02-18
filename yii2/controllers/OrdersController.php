<?php

namespace app\controllers;

use Yii;
use app\models\OrdersForm;
use app\models\Orders;

class OrdersController extends \yii\web\Controller
{
    
    public function actionIndex()
    {
        $userModel = Yii::$app->user->identity;

        $username = '';
        $email = '';

        if (is_null($userModel) === false) {
            $username = $userModel->username;
            $email = $userModel->email;
        }  

        $model = new OrdersForm();



        if($model->load(\Yii::$app->request->post()) && $model->validate()){


            $order = new Orders();

            
            $order->name = $model->name;
            $order->email = $model->email;
            $order->phone = $model->phone;
            $order->perfect_connect = $model->perfect_connect;
            $order->goals = $model->goals; 
            $order->problem = $model->problem;
            $order->created_at = date("Y-m-d");
            $order->updated_at = date("Y-m-d");
            $order->status = 0;
            $order->note = 'Заявка не обработана';
            $order->game_id = 0;
            
            $order->save();

            try{
                \Yii::$app->mailer->compose('order', ['order' => $order])
                    ->setFrom([\Yii::$app->params['senderEmail'] => \Yii::$app->params['senderName']])
                    ->setTo([\Yii::$app->params['supportEmail']])
                    ->setSubject('Заказ на сайте')
                    ->send();
            }catch (\Swift_TransportException $e){
                //var_dump($e); die;
            }
 
            
            // echo '<pre>';
            // print_r($model);
            // echo '</pre>';
            
            
            \Yii::$app->session->setFlash('success', 'Ваша заявка принята!');
            return $this->refresh();
        }

        return $this->render('index', compact('username', 'email', 'model'));
        
    }

}