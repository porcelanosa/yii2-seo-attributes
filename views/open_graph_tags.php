<?php
	/**
	 * @var $seoform \yii\widgets\ActiveForm
	 */
	?>

<?= $seoform->field($model, 'og_title') ?>

<?= $seoform->field($model, 'og_description')->textInput() ?>
<?= $seoform->field($model, 'og_type') ?>
<?= $seoform->field($model, 'og_url') ?>
<?= $seoform->field($model, 'og_image') ?>
<?= $seoform->field($model, 'og_site_name') ?>
<?= $seoform->field($model, 'article_published_time') ?>
<?= $seoform->field($model, 'article_modified_time') ?>
<?= $seoform->field($model, 'article_section') ?>
<?= $seoform->field($model, 'article_tag') ?>
<?= $seoform->field($model, 'fb_admins') ?>
<?= $seoform->field($model, 'og_price_amout') ?>
<?= $seoform->field($model, 'og_price_currency') ?>
