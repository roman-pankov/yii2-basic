<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;


class CacheController extends Controller
{

    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->testCache('2018-01-01', 1);
    }

    public function testCache($date, $type)
    {
        $userId = Yii::$app->user->id;

        $cache = Yii::$app->cache;
        $result = $cache->getOrSet('foo_key_' . $userId, function () use ($date, $type, $userId) {
            $dataList = SomeDataModel::find()->where(['date' => $date, 'type' => $type, 'user_id' => $userId])->all();
            $result = [];

            if (!empty($dataList)) {
                foreach ($dataList as $dataItem) {
                    $result[$dataItem->id] = ['a' => $dataItem->a, 'b' => $dataItem->b];
                }
            }
        });

        return $result;
    }

}
