<?php
	/**
	 * @var $model   \porcelanosa\yii2seo\models\SeoAttributes
	 * @var $seoform \yii\widgets\ActiveForm
	 * @var $behavior \porcelanosa\yii2seo\SeoBehavior
	 */
	/**
	 * @var $view \yii\web\View
	 */
	use kartik\widgets\FileInput;
	use \app\components\helpers\MyHelper;
	use \app\components\helpers\ThumbHelper;
	use yii\helpers\Html;
	use yii\helpers\Url;
	$path = $behavior->uploadPath;
?>

<?=$seoform->field( $model, 'og_title' )?>

<?=$seoform->field( $model, 'og_description' )->textInput()?>
<?=$seoform->field( $model, 'og_type' )?>
<?=$seoform->field( $model, 'og_url' )?>
	<? $img_path = $path.$model->og_image;?>
<?=Html::img($img_path) ;?>
	
	<? if(MyHelper::IFF($img_path)):?>
		<? $url = Url::to(['seo/delimage'])?>
		<?= $img_path ;?>
		<?= ThumbHelper::thumbnailImg($img_path, 200, 100)?>
		<h5><a href="#" id="del-<?=$model->id?>">Удалить</a> </h5>
		<?
		$del_script = <<<JS
			$(document).ready(function() {
			  $('#del-$model->id').on('click', function(e) {
			      e.preventDefault();
			      $.ajax({
			          type: "POST",
			          data: { 'id':$model->id, 'img_attr' : 'og_image'},
			          dataType: "json",
			          url: "/seo/default/delimage",
			          success: function(data) {
			            
			          }
			      })
			       return false;
			  })
			})
JS;
		$view->registerJs($del_script)
		?>
	<?endif;?>
<?=$seoform->field( $model, 'og_image' )->widget(
	FileInput::classname(), [
	'options'       => [
		'accept' => 'image/*'
	],
	'pluginOptions' => [
		'allowedFileExtensions' => [ 'jpg', 'gif', 'png' ]
	]
]);
?>
<?=$seoform->field( $model, 'og_site_name' )?>
<?=$seoform->field( $model, 'article_published_time' )?>
<?=$seoform->field( $model, 'article_modified_time' )?>
<?=$seoform->field( $model, 'article_section' )?>
<?=$seoform->field( $model, 'article_tag' )?>
<?=$seoform->field( $model, 'fb_admins' )?>
<?=$seoform->field( $model, 'og_price_amout' )?>
<?=$seoform->field( $model, 'og_price_currency' )?>
