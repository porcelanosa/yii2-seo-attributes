<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model porcelanosa\yii2seo\models\SeoAttributes */
/* @var $seoform ActiveForm */
?>
<div class="main">


        <?= $seoform->field($model, 'meta_descr')->textInput() ?>

        <?= $seoform->field($model, 'title') ?>
        <?/*= $seoform->field($model, 'og_title') */?><!--
        <?/*= $seoform->field($model, 'og_type') */?>
        <?/*= $seoform->field($model, 'og_url') */?>
        <?/*= $seoform->field($model, 'og_image') */?>
        <?/*= $seoform->field($model, 'og_site_name') */?>
        <?/*= $seoform->field($model, 'article_published_time') */?>
        <?/*= $seoform->field($model, 'article_modified_time') */?>
        <?/*= $seoform->field($model, 'article_section') */?>
        <?/*= $seoform->field($model, 'article_tag') */?>
        <?/*= $seoform->field($model, 'fb_admins') */?>
        <?/*= $seoform->field($model, 'og_price_amout') */?>
        <?/*= $seoform->field($model, 'og_price_currency') */?>
        <?/*= $seoform->field($model, 'itemscope') */?>
        <?/*= $seoform->field($model, 'itemprop_name') */?>
        <?/*= $seoform->field($model, 'itemprop_description') */?>
        <?/*= $seoform->field($model, 'itemprop_image') */?>
        <?/*= $seoform->field($model, 'twitter_card') */?>
        <?/*= $seoform->field($model, 'twitter_site') */?>
        <?/*= $seoform->field($model, 'twitter_title') */?>
        <?/*= $seoform->field($model, 'twitter_creator') */?>
        <?/*= $seoform->field($model, 'twitter_image') */?>
        <?/*= $seoform->field($model, 'twitter_data1') */?>
        <?/*= $seoform->field($model, 'twitter_label1') */?>
        <?/*= $seoform->field($model, 'twitter_data2') */?>
        --><?/*= $seoform->field($model, 'twitter_label2') */?>
	<!--<div class="form-group">
		<?/*=Html::submitButton( $model->isNewRecord ? Yii::t( 'app', 'Create' ) : Yii::t( 'app', 'Update' ), [ 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary' ] )*/?>
	</div>
    -->

</div><!-- main -->
