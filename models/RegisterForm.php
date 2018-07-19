<?php

namespace app\models;

use Yii;
use yii\base\Model;


class RegisterForm extends Model
{
    const SCENARIO_INDIVIDUAL              = 'individual';
    const SCENARIO_INDIVIDUAL_ENTREPRENEUR = 'individual-entrepreneur';
    const SCENARIO_LEGAL_ENTITY            = 'legal-entity';

    public $type;
    public $email;
    public $name;
    public $tin;
    public $organization_name;

    public function rules()
    {
        return [
            ['type', 'required',],
            ['email', 'required', 'message' => 'Введите значение',],
            ['email', 'email', 'message' => 'Введите валидный email',],
            ['name', 'required', 'message' => 'Введите значение',],
            ['tin', 'required', 'message' => 'Введите значение',],
            ['organization_name', 'required', 'message' => 'Введите значение',],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email'             => 'Почта',
            'name'              => 'ФИО',
            'tin'               => 'ИНН',
            'organization_name' => 'Название организации',
        ];

    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_INDIVIDUAL] = ['type', 'email', 'name'];
        $scenarios[self::SCENARIO_INDIVIDUAL_ENTREPRENEUR] = ['type', 'tin'];
        $scenarios[self::SCENARIO_LEGAL_ENTITY] = ['type', 'email', 'name', 'tin', 'organization_name'];

        return $scenarios;
    }

}