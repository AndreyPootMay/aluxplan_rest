<?php

declare(strict_types=1);

namespace app\controllers;

use app\models\Contacts;
use Yii;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\ServerErrorHttpException;

final class ContactsController extends Controller
{
    public function actionIndex(): Response
    {
        $dataProvider = Contacts::find()
            ->where(['active' => 1])
            ->all();

        return $this->asJson($dataProvider);
    }

    public function actionView(int $id): Response
    {
        $model = Contacts::findOne($id);

        return $this->asJson($model);
    }

    public function actionDelete(int $id): Response
    {
        $model = Contacts::findOne($id);
        $model->active = !$model->active;
        $model->save(false);

        return $this->asJson(['message' => 'Model updated successfully']);
    }

    public function actionCreate(): Response
    {
        $model = new Contacts();
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');

        if ($model->save(false)) {
            Yii::$app->response->setStatusCode(201);

            return $this->asJson($model);
        } elseif (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to create the resource for unknown reason.');
        }
    }

    public function actionUpdate(int $id): Response
    {
        $model = Contacts::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("Object not found: {$id}");
        }

        $model->load(Yii::$app->getRequest()->getBodyParams(), '');

        if ($model->save(false)) {
            return $this->asJson($model);
        } elseif (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to update the resource for unknown reason.');
        }
    }
}
