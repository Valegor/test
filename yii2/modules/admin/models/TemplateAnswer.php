<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "template_answer".
 *
 * @property int $id
 * @property int|null $template_id
 * @property int|null $author_id
 * @property string|null $author_name
 * @property string|null $author_email
 * @property int|null $aviable
 * @property string|null $object
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class TemplateAnswer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'template_answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['template_id', 'author_id', 'aviable'], 'integer'],
            [['object', 'title', 'subtitle', 'notes'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['author_name', 'author_email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'notes' => 'Notes',
            'template_id' => 'Template ID',
            'author_id' => 'Author ID',
            'author_name' => 'Author Name',
            'author_email' => 'Author Email',
            'aviable' => 'Aviable',
            'object' => 'Object',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
