<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "score".
 *
 * @property int $id
 * @property string $user_email
 * @property string $user_name
 * @property int|null $score
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Score extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'score';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_email', 'user_name'], 'required'],
            [['score'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_email', 'user_name'], 'string', 'max' => 255],
            [['user_email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_email' => 'User Email',
            'user_name' => 'User Name',
            'score' => 'Score',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
