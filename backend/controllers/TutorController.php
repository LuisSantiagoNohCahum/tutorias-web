<?php

namespace backend\controllers;

use app\models\Tutor;
use backend\models\search\TutorSearch;
use common\models\User;
use common\models\SignupForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TutorController implements the CRUD actions for Tutor model.
 */
class TutorController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Tutor models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TutorSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tutor model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tutor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        //setear que al registrar sea activo (10) por defecto
        //mandar correo con credenciales al registrar

        //en findbyusername podemos pasar un var que represente si es front o back y ejecute una consulta donde tenga el fintro para saber si es tutor el que quiere loguarse

        $model = new Tutor();
        $user = new SignupForm();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $user->username = $this->getUsername($model->nombre, $model->apellido);
                $user->password = $this->getPassword($model->nombre, $model->apellido);;
                $user->email = $model->correo;
                $user->signup();

                //$userSave = new User();
                //$userSave = $userSave->findByUsername();
                
                $userSave = User::find()->where(['username'=> $user->username])->one();

                $model->id_user = $userSave->id;

                if (!$model->save()) {
                    $userSave->delete();
                }
                //si no se inserto uno hay que eliminar el otro

                /* 
                echo $user->username . " - " . $user->password;
                die(); 
                */

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tutor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tutor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $deleteObj = $this->findModel($id);
        $user = $deleteObj->user;
        
        //elimina el tutor con el id tal
        $deleteObj->delete();
        //elimina la cuenta del usuario con el id tal
        $user->delete();
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Tutor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Tutor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tutor::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function getPassword($name, $lastname){
        $pass = substr(trim($name), 0, 2) . substr(trim($lastname), 0, 2);
        $pass = strtoupper($pass) . $this->rand_string(8);
        
        //$pass = $pass + bin2hex(openssl_random_pseudo_bytes(4));
        
        return $pass;
    }

    public function getUsername($name, $lastname){
        $names = explode(' ', trim(preg_replace('#[\s]+#', ' ', $name)));
        $lastnames = explode(' ', trim(preg_replace('#[\s]+#', ' ', $lastname)));

        $chrName = (count($names)>1) ? strtolower($names[0]) : trim($name);
        $chrLastname = (count($lastnames)>1) ? strtolower($lastnames[0])[0] . strtolower($lastnames[1])[0] : substr(trim($lastname), 0, 2) ;
        $username =  $chrName. '.' . $chrLastname;

        return strtolower($username);
    }

    function rand_string( $length ) {

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
    
    }

}
