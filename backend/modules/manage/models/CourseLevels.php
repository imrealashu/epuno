<?php

namespace backend\modules\manage\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "course_levels".
 *
 * @property integer $level_id
 * @property integer $course_id
 * @property integer $institute_id
 * @property string $name
 * @property string $duration
 * @property string $amount
 * @property integer $updated_at
 * @property integer $created_at
 * @property integer $user_id
 */
class CourseLevels extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_levels';
    }
    public function behaviors()
        {
            return [
                [
                    'class' => TimestampBehavior::className(),
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    ],
                ],
            ];
        }
    /**
     * @inheritdoc
     */
    public function scenarios(){
        $scenarios = parent::scenarios();
        $scenarios['new'] = [];
        return $scenarios;
    }

    public function rules()
    {
        return [
            [['name','amount','duration'],'required','on'=>'update'],
            [['course_id','institute_id','updated_at','created_at','user_id','status'], 'integer'],
            [['name', 'duration', 'amount'], 'string', 'max' => 128],
            [['amount'],'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'level_id' => 'Level ID',
            'course_id' => 'Course ID',
            'institute_id' => 'Institute ID',
            'name' => 'Level Name',
            'duration' => 'Level Duration',
            'amount' => 'Level Amount',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
            'user_id' => 'User ID',
            'status'=>'Status',
        ];
    }
}
