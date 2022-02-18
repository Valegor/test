<?php

namespace app\models;

use yii\base\Model;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $status
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $perfect_connect
 * @property string|null $goals
 * @property string|null $problem
 * @property string|null $note
 * @property int|null $game_id
 */
class OrdersForm extends Model
{
    public $id;
    public $created_at;
    public $updated_at;
    public $status;
    public $name;
    public $email;
    public $phone;
    public $perfect_connect;
    public $goals;
    public $problem;
    public $note;
    public $game_id;

    public static function tableName()
    {
        return 'orders';
    }




    public function rules()
    {
        return [
            // [['name', 'email', 'perfect_connect' ,'goals', 'problem'], 'required'],
            // ['email', 'email'],
            [['goals', 'problem'], 'string', 'min' => 5],
            [['name', 'email', 'perfect_connect'], 'string', 'max' => 255],
            [['name', 'email', 'perfect_connect', 'goals', 'problem'], 'required'],
            ['email', 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Статус',
            'name' => 'Имя',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'perfect_connect' => 'Способ связи',
            'goals' => 'Цели игры',
            'problem' => 'Игровые проблемы',
            'note' => 'Описание',
            'game_id' => 'Game ID',
        ];
    }


}
