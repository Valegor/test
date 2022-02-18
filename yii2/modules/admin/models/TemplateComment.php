<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "template_comment".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $template_id
 * @property string|null $text
 * @property int|null $author_id
 * @property string|null $author_name
 * @property string|null $author_email
 * @property int|null $aviable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class TemplateComment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'template_comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'template_id', 'author_id', 'aviable'], 'integer'],
            [['text', 'author_name', 'author_email'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'template_id' => 'Template ID',
            'text' => 'Text',
            'author_id' => 'Author ID',
            'author_name' => 'Author Name',
            'author_email' => 'Author Email',
            'aviable' => 'Aviable',
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
