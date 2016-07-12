<?php
 namespace porcelanosa\yii2seo\controllers;
 
 use porcelanosa\yii2seo\FileNotFoundException;
 use porcelanosa\yii2seo\models\SeoAttributes;
 use yii\helpers\FileHelper;
 use yii\helpers\Json;
 use yii\web\Controller;

 class DefaultController extends Controller {
 	
 	public function actionDelimage() {
	    $id= \Yii::$app->request->post('id');
	    $img_attr = \Yii::$app->request->post('og_image')!=''?\Yii::$app->request->post('og_image'):'og_image';
	    $success = false;
	    $uploadPath  = \Yii::getAlias(\Yii::$app->getModule('seo')->uploadPath);
	    $seo_model = SeoAttributes::findOne($id);
	    $img_path = FileHelper::normalizePath(\Yii::getAlias($uploadPath).$seo_model->$img_attr);
	    $seo_model->$img_attr = '';
	    if($seo_model->save($img_attr)) {
		    try{
			    unlink($img_path);
			    $success = true;
		    }
		    catch(\Exception $e) {
			    throw new FileNotFoundException('File not found');
		    }
	    }
	    return Json::encode(['success'=>$success]);
    }
 }