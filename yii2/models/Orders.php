<?php

namespace app\models;

use Yii;

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
 *
 * @property OrderCards $id0
 * @property OrderCards[] $orderCards
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['status', 'game_id'], 'integer'],
            [['goals', 'problem', 'note'], 'string'],
            [['name', 'email', 'phone', 'perfect_connect'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'perfect_connect' => 'Perfect Connect',
            'goals' => 'Goals',
            'problem' => 'Problem',
            'note' => 'Note',
            'game_id' => 'Game ID',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(OrderCards::className(), ['order_id' => 'id']);
    }

    /**
     * Gets query for [[OrderCards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderCards()
    {
        return $this->hasMany(OrderCards::className(), ['order_id' => 'id']);
    }
}
