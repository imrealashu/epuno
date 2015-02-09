<?php

namespace backend\modules\manage\models;

use Yii;

/**
 * This is the model class for table "institute_details".
 *
 * @property integer $institute_id
 * @property string $name
 * @property string $address
 * @property string $email
 * @property string $contact_person
 * @property string $landline_number
 * @property string $phone_number
 * @property string $website
 * @property string $affiliation
 * @property string $awards
 * @property integer $estd
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_id
 * @property integer $status
 */
class InstituteDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'institute_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'email', 'contact_person', 'landline_number', 'phone_number', 'website', 'affiliation', 'awards', 'estd', 'created_at', 'updated_at', 'user_id', 'status'], 'required'],
            [['address'], 'string'],
            [['estd', 'created_at', 'updated_at', 'user_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['email'], 'string', 'max' => 64],
            [['contact_person', 'landline_number', 'phone_number', 'website', 'affiliation', 'awards'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'institute_id' => 'Institute ID',
            'name' => 'Name',
            'address' => 'Address',
            'email' => 'Email',
            'contact_person' => 'Contact Person',
            'landline_number' => 'Landline Number',
            'phone_number' => 'Phone Number',
            'website' => 'Website',
            'affiliation' => 'Affiliation',
            'awards' => 'Awards',
            'estd' => 'Estd',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
            'status' => 'Status',
        ];
    }
}
