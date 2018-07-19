<?php

namespace app\controllers;

use app\models\RegisterForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class RegisterController extends Controller
{

    /**
     * @return string
     */
    public function actionIndex()
    {
        if (!empty($this->module->requestedAction->id)) {
            // @todo Валидация scenario
            $scenario = $this->module->requestedAction->id;

            $model = new RegisterForm(['scenario' => $scenario]);
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                // @todo Сохранение данных в базу
                return $this->render('success', ['model' => $model]);
            }

            return $this->render($scenario, [
                'model' => $model,
            ]);
        }


        return $this->render('index');
    }

    /**
     * Физ.лицо
     * @return int|mixed|\yii\console\Response
     */
    public function actionIndividual()
    {
        return Yii::$app->runAction('register/index', ['scenario' => RegisterForm::SCENARIO_INDIVIDUAL]);
    }

    /**
     * ИП
     * @return int|mixed|\yii\console\Response
     */
    public function actionIndividualEntrepreneur()
    {
        return Yii::$app->runAction('register/index', ['scenario' => RegisterForm::SCENARIO_INDIVIDUAL_ENTREPRENEUR]);
    }

    /**
     * Юр.лицо
     * @return int|mixed|\yii\console\Response
     */
    public function actionLegalEntity()
    {
        return Yii::$app->runAction('register/index', ['scenario' => RegisterForm::SCENARIO_LEGAL_ENTITY]);
    }
}
