<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;
Use app\modules\admin\models\Category;

/**
 * This is the model class for table "card".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $category_id
 * @property string $category
 * @property string $img1
 * @property string|null $img2
 * @property string|null $backimg
 * @property string|null $notes
 *
 * @property Category $category0
 */
class Card extends \yii\db\ActiveRecord
{
    public $file_img1;
    public $file_img2;
    public $file_img3;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name', 'category_id'], 'required'],
            [['category_id'], 'integer'],
            [['notes'], 'string'],
            [['code', 'name', 'category', 'img1', 'img2', 'backimg'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            // [['category'], 'default', 'value' => $this->categoryName($this->category_id)],
            [['img1'], 'default', 'value' => 'cards/blank.jpg'],
            [['img2'], 'default', 'value' => 'cards/blank.jpg'],
            [['backimg'], 'default', 'value' => 'cards/blank.jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'category' => 'Category',
            'img1' => 'Img1',
            'img2' => 'Img2',
            'backimg' => 'Backimg',
            'notes' => 'Notes',
        ];
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function categoryName($category_id)
    {
        $category = Category::findOne($category_id);
        return $category->name;
    }



    public function beforeSave($insert)
    {
        if($file_img1 = UploadedFile::getInstance($this, 'file_img1')){
            $dir = 'cards/' . date("Y-m-d") . '/';
            if(!is_dir($dir)){
                mkdir($dir);
            }
            $file_name = uniqid() . '_' . $file_img1->baseName . '.' . $file_img1->extension;
            $this->img1 = $dir . $file_name;
            $file_img1->saveAs($this->img1);
        }

        if($file_img2 = UploadedFile::getInstance($this, 'file_img2')){
            $dir = 'cards/' . date("Y-m-d") . '/';
            if(!is_dir($dir)){
                mkdir($dir);
            }
            $file_name = uniqid() . '_' . $file_img2->baseName . '.' . $file_img2->extension;
            $this->img2 = $dir . $file_name;
            $file_img2->saveAs($this->img2);
        }

        if($file_img3 = UploadedFile::getInstance($this, 'file_img3')){
            $dir = 'cards/' . date("Y-m-d") . '/';
            if(!is_dir($dir)){
                mkdir($dir);
            }
            $file_name = uniqid() . '_' . $file_img3->baseName . '.' . $file_img3->extension;
            $this->backimg = $dir . $file_name;
            $file_img3->saveAs($this->backimg);
        }

        $this->category = $this->categoryName($this->category_id);


        return parent::beforeSave($insert);

    }

}
