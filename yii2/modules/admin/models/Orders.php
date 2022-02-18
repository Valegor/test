<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

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
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
            'status' => 'Статус',
            'name' => 'Имя заказчика',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'perfect_connect' => 'Способ связи',
            'goals' => 'Цели',
            'problem' => 'Проблемы',
            'note' => 'Примечание',
            'game_id' => 'Game ID',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}
