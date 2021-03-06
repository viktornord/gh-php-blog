<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property mixed posts
 * @property integer $active
 *
 */
class Category extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    /**
     * @return String[]
     */
    public static function getNames()
    {
        return ArrayHelper::getColumn(self::find()->all(), 'title');
    }

    /**
     * @param $categories_id
     * @return Category[]
     */
    public static function getCategoriesById($categories_id) {
        return self::find()->where(['id' => $categories_id, 'active' => true])->all();
    }

    public function getPosts() {
        return $this->hasMany(Post::className(), ['id' => 'post_id'])
            ->viaTable('category_post', ['category_id' => 'id']);
    }


    public function getPostsOfThisCategoryOnly()
    {
        $posts = [];
        foreach($this->posts as $post) {
            $categories = $post->categories;
            if (count($categories) === 1 && $categories[0]->id === $this->id) {
                $posts[] = $post;
            }
        }
        return $posts;
    }
}
