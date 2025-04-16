<?php
declare(strict_types=1);

namespace app\controllers;

use app\models\Application;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

/**
 * Controller to process actions related to the application.
 */
class ApplicationController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['create', 'edit'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'create' => ['GET', 'POST'],
                    'edit' => ['GET', 'POST'],
                ],
            ],
        ];
    }

    /**
     * Action to create a new application record.
     */
    public function actionCreate(): Response|string
    {
        $model = new Application();

        if ($this->request->isPost) {
            if (!$model->load(Yii::$app->request->post())) {
                throw new BadRequestHttpException('Invalid or malformed request.');
            }

            if (!$model->validate()) {
                Yii::$app->session->setFlash('error', 'Validation failed. Please check your input.');
            } else {
                if (!$model->save(false)) {
                    Yii::$app->session->setFlash('error', 'Failed to save the application. Please try again.');
                } else {
                    Yii::$app->session->setFlash('success', 'Application submitted successfully.');
                    return $this->redirect('index');
                }
            }
        }

        return $this->render('create', ['model' => $model]);
    }

    /**
     * Action to edit an existing application record.
     */
    public function actionEdit(int $id): Response|string
    {
        $model = Application::findOne($id);

        if ($model === null) {
            throw new NotFoundHttpException('Application not found.');
        }

        if ($this->request->isPost) {
            if (!$model->load(Yii::$app->request->post())) {
                throw new BadRequestHttpException('Invalid or malformed request.');
            }

            if (!$model->validate()) {
                Yii::$app->session->setFlash('error', 'Validation failed. Please check your input.');
            } else {
                if (!$model->save(false)) {
                    Yii::$app->session->setFlash('error', 'Failed to save the application. Please try again.');
                } else {
                    Yii::$app->session->setFlash('success', 'Application submitted successfully.');
                    return $this->redirect('/site/index');
                }
            }
        }

        return $this->render('edit', ['model' => $model]);
    }
}
