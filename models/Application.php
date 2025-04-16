<?php
declare(strict_types=1);

namespace app\models;

use yii\behaviors\TimestampBehavior;

/**
 * Model class for the `{{%application}}` table.
 *
 * @property int $id The primary key.
 * @property string $first_name The first name of the applicant.
 * @property string $last_name The last name of the applicant.
 * @property string $date_of_birth The date of birth of the applicant.
 * @property string|null $description A description of the application.
 * @property float|null $income The income of the applicant.
 * @property int|null $number_of_dependants The number of dependants of the applicant.
 * @property string $created_at The timestamp when the application was created in the database.
 * @property string|null $updated_at The timestamp when the application was last updated in the database.
 */
class Application extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return '{{%application}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors(): array
    {
        return ['timestamp' => ['class' => TimestampBehavior::class]];
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            'required' => [
                ['first_name', 'last_name', 'date_of_birth'],
                'required',
            ],
            'string_max_255' => [
                ['first_name', 'last_name'],
                'string',
                'max' => 255,
            ],
            'string_max_65535' => [
                ['description'],
                'string',
                'max' => 65535,
            ],
            'date' => [
                ['date_of_birth'],
                'date',
                'format' => 'php:Y-m-d',
            ],
            'number' => [
                ['income'],
                'number',
            ],
            'integer_min_0' => [
                ['number_of_dependants'],
                'integer',
                'min' => 0,
            ],
        ];
    }

}
