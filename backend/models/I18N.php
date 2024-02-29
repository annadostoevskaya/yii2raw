<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_i18n".
 *
 * @property int $id
 * @property string $key
 * @property string $code
 * @property string $message
 */
class I18N extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't_i18n';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'code', 'message'], 'required'],
            [['key', 'code', 'message'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'code' => 'Code',
            'message' => 'Message',
        ];
    }
}
