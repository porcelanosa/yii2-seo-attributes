<?php
 namespace porcelanosa\yii2seo;
 
 use porcelanosa\yii2seo\models\SeoAttributes;
 use yii\helpers\FileHelper;
 use yii\web\Controller;

 class DefaultController extends Controller {
 	
 	public function actionDelimage($id, $img_attr = 'og_image') {
	    $uploadPath  = \Yii::getAlias(\Yii::$app->getModule('seo')->uploadPath);
	    $seo_model = SeoAttributes::findOne($id);
	    $img_path = FileHelper::normalizePath(\Yii::getAlias($uploadPath).$seo_model->$img_attr);
	    $seo_model->$img_attr = '';
	    if($seo_model->save($img_attr)) {
		    try{
			    unlink($img_path);
		    }
		    catch(\Exception $e) {
			    throw FileNotFoundException::class;
		    }
	    }
    }
 }