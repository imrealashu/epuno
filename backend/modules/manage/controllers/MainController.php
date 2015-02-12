<?php

namespace backend\modules\manage\controllers;

use yii;
use backend\modules\manage\models\InstituteDetails;
use backend\modules\manage\models\InstituteDetailsSearch;
use backend\modules\manage\models\CourseDetails;
use backend\modules\manage\models\CourseLevels;
use backend\modules\manage\models\CourseCategories;
use yii\web\Controller;
use yii\web\UploadedFile;

class MainController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new InstituteDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionFileUpload(){
        $model = InstituteDetails::findOne(yii::$app->request->post('i_id'));
        if ($model->load(yii::$app->request->post())) {
              $model->logo = UploadedFile::getInstance($model, 'file');

            if ($model->logo) {     
                $model->logo = $i_id;
                $model->logo->saveAs('uploads/' . $model->institute_id . '.' . $model->logo->extension);
                $model->save();
            }
        }
    }
    public function actionCreate(){
    	$model = new InstituteDetails();
    	$model->save();
    	return $this->redirect(['update','i_id'=>$model->institute_id]);
    }
    public function actionUpdate(){
    	$i_id = yii::$app->request->get('i_id'); 
    	$model = InstituteDetails::findOne($i_id);
        $levels = CourseLevels::find()->where(['institute_id'=>$i_id])->asArray()->all();
        $courses = CourseDetails::find()->where(['institute_id'=>$i_id])->asArray()->all();

    	if ($model->load(Yii::$app->request->post())) {

            $model->save();
        }else{
            return $this->render('update',['model'=>$model,'courses'=>array_reverse($courses),'levels'=>array_reverse($levels)]);           
        }
    	
    }
    public function actionUpdateInstitute(){
        $i_id = Yii::$app->request->post('institute_id');
        $model = InstituteDetails::findOne($i_id);
        $model->user_id = Yii::$app->user->identity->id;
        if($model->load(yii::$app->request->post()) && $model->validate()){
            $model->status = '1';
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
        $levels = CourseLevels::find()->where(['institute_id'=>yii::$app->request->post('institute_id')])->asArray()->all();
        return $this->renderPartial('_ajaxCourses',['courses'=>array_reverse($model),'levels'=>array_reverse($levels)]);
    }

    public function actionEditCourse(){
        $course_id = yii::$app->request->post('course_id');
        $model = CourseDetails::findOne($course_id);
        return $this->renderPartial('_course',['model'=>$model]);
    }
    public function actionDeleteCourse(){
        $course_id = yii::$app->request->post('course_id');
        $model = CourseDetails::findOne($course_id);
        $model->delete();
        $courses = CourseDetails::find()->where(['institute_id'=>yii::$app->request->post('institute_id')])->asArray()->all();
        $levels = CourseLevels::find()->where(['institute_id'=>yii::$app->request->post('institute_id')])->asArray()->all();
        return $this->renderPartial('_ajaxCourses',['courses'=>array_reverse($courses),'levels'=>array_reverse($levels)]);
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
            $model->validate();
            $model->save();
        }
    }
    public function actionEditLevel(){
        $level_id = yii::$app->request->post('level_id');
        $model = CourseLevels::findOne($level_id);

        return $this->renderPartial('_level',['model'=>$model]);
    }
    public function actionDeleteLevel(){
        $level_id = yii::$app->request->post('level_id');
        $model = CourseLevels::findOne($level_id);
        $model->delete();
        $courses = CourseDetails::find()->where(['institute_id'=>yii::$app->request->post('institute_id')])->asArray()->all();
        $levels = CourseLevels::find()->where(['institute_id'=>yii::$app->request->post('institute_id')])->asArray()->all();
        return $this->renderPartial('_ajaxCourses',['courses'=>array_reverse($courses),'levels'=>array_reverse($levels)]);
    }
    public function actionAddCategory(){
        $model = new CourseCategories();
        $model->save();
        $categories = CourseCategories::findOne($model->category_id);
          return $this->renderPartial('_category',['model'=>$categories]);
        
    }
    public function actionSaveCategory(){
        $category_id = yii::$app->request->post('category_id');
        $model = CourseCategories::findOne($category_id);
        $model->user_id = yii::$app->user->identity->id;
        $model->name = yii::$app->request->post('category_name');
        $model->status = 1;
        $model->save();
        $all = CourseCategories::find()->where(['status'=>1])->asArray()->all();
        $content = "";
        foreach($all as $category){
            $content.= '<option value="'.$category['category_id'].'">'.$category['name'].'</option>';
        }
        echo $content;
    }
    protected function findInstituteById($id){
    	  if (($model = InstituteDetails::find()->where(['institute_id'=>$id])) !== null) {
            return $model;
        } else {
            
        }
    }
}
