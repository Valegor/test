<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;
Use app\modules\admin\models\GameCategory;
Use app\modules\admin\models\User;
Use app\modules\admin\models\GameCard;
Use app\modules\admin\models\Card;
use yii\helpers\Json;

/**
 * This is the model class for table "game".
 *
 * @property int $id
 * @property string $name
 * @property int|null $author_id
 * @property int $category_id
 * @property string|null $category
 * @property string|null $subtitle
 * @property string|null $notes
 * @property string|null $object
 * @property string|null $img
 * @property int|null $aviable
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property GameCategory $gameCategory
 * @property GameCard $id0
 */
class Game extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $file;

    public static function tableName()
    {
        return 'game';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['author_id', 'category_id', 'aviable'], 'integer'],
            [['subtitle', 'notes', 'object'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'category', 'img'], 'string', 'max' => 255],
            [['id'], 'exist'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'author_id' => 'Author ID',
            'category_id' => 'Category ID',
            'category' => 'Category',
            'subtitle' => 'Subtitle',
            'notes' => 'Notes',
            'object' => 'Object',
            'img' => 'Img',
            'aviable' => 'Aviable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[GameCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGameCategory()
    {
        return $this->hasOne(GameCategory::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(GameCard::class, ['game_id' => 'id']);
    }

    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
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

    public function categoryName($category_id)
    {
        $category = GameCategory::findOne($category_id);
        return $category->category;
    }

    public function beforeSave($insert)
    {
        if($file = UploadedFile::getInstance($this, 'file')){
            $dir = 'posts/' . date("Y-m-d") . '/';
            if(!is_dir($dir)){
                mkdir($dir);
            }
            $file_name = uniqid() . '_' . $file->baseName . '.' . $file->extension;
            $this->img = $dir . $file_name;
            $file->saveAs($this->img);
        }

        $this->category = $this->categoryName($this->category_id);


        return parent::beforeSave($insert);

    }

    public function getGameCard()
    {
        return $this->hasMany(GameCard::class, ['game_id' => 'id']);
    }

    public function getCategoryCard($id)
    {
        $cards = Card::find()
        ->where(['category_id' => $id])
        ->all();

        return $cards;
    }

    // public function afterFind() {
    //     $this->object = Json::decode($this->object);
    // }

}
