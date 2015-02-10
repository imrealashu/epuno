<?php

namespace backend\modules\manage\controllers;

use yii;
use backend\modules\manage\models\InstituteDetails;
use backend\modules\manage\models\CourseDetails;
use backend\modules\manage\models\CourseLevels;
use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionCreate(){
    	$model = new InstituteDetails();
    	$model->save();
    	return $this->redirect(['update','i_id'=>$model->institute_id]);
    }
    public function actionUpdate(){
    	$i_id = yii::$app->request->get('i_id'); 
    	$model = InstituteDetails::findOne($i_id);
        $levels = CourseLevels::find()->where(['institute_id'=>$i_id]);
        $courses = CourseDetails::find()->where(['institute_id'=>$i_id])->asArray()->all();

    	if ($model->load(Yii::$app->request->post())) {
            $model->save();
        }else{
            return $this->render('update',['model'=>$model,'courses'=>$courses,'levels'=>$levels]);           
        }
    	
    }
    public function actionUpdateInstitute(){
        $i_id = Yii::$app->request->post('institute_id');
        $model = InstituteDetails::findOne($i_id);
        $model->user_id = Yii::$app->user->identity->id;
        if($model->load(yii::$app->request->post()) && $model->validate()){
            $model->save();
            echo '1';
        }else{
            echo '0';
        }
    }

    public function actionNewCourseField(){
        $model = new CourseDetails();
        $model->institute_id = Yii::$app->request->post('institute_id');
        $model->user_id = Yii::$app->user->identity->id;
        $model->save();
        $model2 = CourseDetails::findOne($model->course_id);
        return $this->renderPartial('_course',['model'=>$model2]);
        //complications can be there
    }
    public function actionSaveNewCourse(){
        
        $model = CourseDetails::findOne(yii::$app->request->post('course_id'));
        if($model->load(yii::$app->request->post()) && $model->validate()){
            $model->save();
        }
    }
    public function actionGetAllCourse(){
        $model = CourseDetails::find()->where(['institute_id'=>yii::$app->request->post('institute_id')])->asArray()->all();
        return $this->renderPartial('_ajaxCourses',['courses'=>$model]);
    }

    public function actionAddNewLevel(){
        $i_id = yii::$app->request->post('institute_id');
        $c_id = yii::$app->request->post('course_id');
        $model = new CourseLevels();
        $model->institute_id = $i_id;
        $model->course_id = $c_id;
        $model->user_id = Yii::$app->user->identity->id;
        $model->save();
        $model2 = CourseLevels::findOne($model->level_id);
       
            return $this->renderPartial('_level',['model'=>$model2]);    
        
    }
    public function actionSaveNewLevel(){
        $l_id = yii::$app->request->post('level_id');
        $model = CourseLevels::findOne($l_id);
        if($model->load(yii::$app->request->post())){
            $model->save();
        }
    }

    protected function findInstituteById($id){
    	  if (($model = InstituteDetails::find()->where(['institute_id'=>$id])) !== null) {
            return $model;
        } else {
            
        }
    }
}
