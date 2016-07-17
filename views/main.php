<?php
	
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	
	/* @var $this yii\web\View */
	/* @var $model porcelanosa\yii2seo\models\SeoAttributes */
	/* @var $seoform ActiveForm */
?>


<?=$seoform->field( $model, 'title' )?>
<?=$seoform->field( $model, 'meta_descr' )->textInput()?>