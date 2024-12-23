<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Barang;
use app\models\LoginForm;
use app\models\UserRegisterForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $products = Barang::find()->all();

        return $this->render('index', ['products' => $products]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */

    public function actionLogin()
    {   
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['site/index']);
        }
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
        //flash message for successful login
            Yii::$app->session->setFlash('success', 'Successfully login');
            return $this->goHome();
        }
        return $this->render('login', ['model' => $model]);
    }

    /**
     * Register action.
     *
     * @return Response|string
     */
    public function actionRegister()
    {
    $model = new UserRegisterForm();
    if ($model->load(\Yii::$app->request->post()) && $model->register()) {
        \Yii::$app->session->setFlash('success', 'Registration successful. You can now log in.');
        return $this->redirect(['login']);
    }
    return $this->render('register', ['model' => $model]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContacts()
    {
    return $this->render('contacts');
    }

    

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    
    
}
