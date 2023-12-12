<?php
namespace frontend\controllers;

use app\models\GrupoMaster;
use app\models\Tutor;
use common\models\User;

use Yii;

class TutorController extends \yii\web\Controller
{
    public function actionIndex()
    {
        /* Traer datos de usuario */
        $modelUser = Yii::$app->user->identity;
        /* Traer datos del tutor */
        $modelTutor = Tutor::find()->where(['id_user'=>$modelUser->id])->one();

        /* Buscar grupo - si tiene grupo , es decir si su id en los ids del select id_tutor from grupomaster*/
        $modelGrupo = GrupoMaster::find()->where(['id_tutor'=>$modelTutor->id])->one();

        //$id = Yii::$app->session->get('id_grupo');

        return $this->render('index', [
            'modelUser'=>$modelUser,
            'modelTutor'=>$modelTutor,
            'modelGrupo'=>$modelGrupo
        ]);
    }

    public function actionUpdate($id){

        $model = Tutor::findOne(['id' => $id]);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->redirect('index', [
            
        ]);
    }

    public function actionActualizarUser($id){
        
        $model = User::findOne(['id' => $id]);

        if ($this->request->isPost && $model->load($this->request->post())) {

            if (!empty($_POST['password']) and isset($_POST['password'])) {
                $model->setPassword($_POST['password']);
            }
            
            if($model->save()) return $this->redirect(['index']);
        }

        return $this->redirect('index', [
            
        ]);
    }
    /* En PAT Index No hay que mandar id */
}
