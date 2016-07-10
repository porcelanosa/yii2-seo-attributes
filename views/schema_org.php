<?php
	
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	
	/* @var $this yii\web\View */
	/* @var $model porcelanosa\yii2seo\models\SeoAttributes */
	/* @var $seoform ActiveForm */
?>

--><?/*= $seoform->field($model, 'title') */?>
        <?= $seoform->field($model, 'itemscope') ?>
        <?= $seoform->field($model, 'itemprop_name') ?>
        <?= $seoform->field($model, 'itemprop_description') ?>
        <?= $seoform->field($model, 'itemprop_image') ?>
       
