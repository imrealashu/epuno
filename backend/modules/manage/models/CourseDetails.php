<?php

namespace backend\modules\manage\models;

use Yii;

/**
 * This is the model class for table "course_details".
 *
 * @property integer $course_id
 * @property integer $category_id
 * @property integer $institute_id
 * @property string $name
 * @property integer $held_on
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_id
 */
class CourseDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'institute_id', 'name', 'held_on', 'created_at', 'updated_at', 'user_id'], 'required'],
            [['category_id', 'institute_id', 'held_on', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => 'Course ID',
            'category_id' => 'Category ID',
            'institute_id' => 'Institute ID',
            'name' => 'Name',
            'held_on' => 'Held On',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
        ];
    }
}
