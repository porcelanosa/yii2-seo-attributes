<?php

namespace porcelanosa\yii2seo\models;

use Yii;

/**
 * This is the model class for table "seo_attributes".
 *
 * @property integer $id
 * @property string $model
 * @property integer $model_id
 * @property string $title
 * @property string $meta_descr
 * @property string $og_title
 * @property string $og_type
 * @property string $og_url
 * @property string $og_image
 * @property string $og_description
 * @property string $og_site_name
 * @property string $article_published_time
 * @property string $article_modified_time
 * @property string $article_section
 * @property string $article_tag
 * @property string $fb_admins
 * @property string $og_price_amout
 * @property string $og_price_currency
 * @property string $itemscope
 * @property string $itemprop_name
 * @property string $itemprop_description
 * @property string $itemprop_image
 * @property string $twitter_card
 * @property string $twitter_site
 * @property string $twitter_title
 * @property string $twitter_description
 * @property string $twitter_creator
 * @property string $twitter_image
 * @property string $twitter_data1
 * @property string $twitter_label1
 * @property string $twitter_data2
 * @property string $twitter_label2
 */
class SeoAttributes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo_attributes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_id'], 'integer'],
            [['meta_descr', 'og_description', 'twitter_description'], 'string'],
            [['model', 'title', 'og_title', 'og_type', 'og_url', 'og_image', 'og_site_name', 'article_published_time', 'article_modified_time', 'article_section', 'article_tag', 'fb_admins', 'og_price_amout', 'og_price_currency', 'itemscope', 'itemprop_name', 'itemprop_description', 'itemprop_image', 'twitter_card', 'twitter_site', 'twitter_title', 'twitter_creator', 'twitter_image', 'twitter_data1', 'twitter_label1', 'twitter_data2', 'twitter_label2'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'model' => Yii::t('app', 'Model'),
            'model_id' => Yii::t('app', 'Model ID'),
            'title' => Yii::t('app', 'Title'),
            'meta_descr' => Yii::t('app', 'Meta Descr'),
            'og_title' => Yii::t('app', 'Og Title'),
            'og_type' => Yii::t('app', 'Og Type'),
            'og_url' => Yii::t('app', 'Og Url'),
            'og_image' => Yii::t('app', 'Og Image'),
            'og_description' => Yii::t('app', 'Og Description'),
            'og_site_name' => Yii::t('app', 'Og Site Name'),
            'article_published_time' => Yii::t('app', 'Article Published Time'),
            'article_modified_time' => Yii::t('app', 'Article Modified Time'),
            'article_section' => Yii::t('app', 'Article Section'),
            'article_tag' => Yii::t('app', 'Article Tag'),
            'fb_admins' => Yii::t('app', 'Fb Admins'),
            'og_price_amout' => Yii::t('app', 'Og Price Amout'),
            'og_price_currency' => Yii::t('app', 'Og Price Currency'),
            'itemscope' => Yii::t('app', 'Itemscope'),
            'itemprop_name' => Yii::t('app', 'Itemprop Name'),
            'itemprop_description' => Yii::t('app', 'Itemprop Description'),
            'itemprop_image' => Yii::t('app', 'Itemprop Image'),
            'twitter_card' => Yii::t('app', 'Twitter Card'),
            'twitter_site' => Yii::t('app', 'Twitter Site'),
            'twitter_title' => Yii::t('app', 'Twitter Title'),
            'twitter_description' => Yii::t('app', 'Twitter Description'),
            'twitter_creator' => Yii::t('app', 'Twitter Creator'),
            'twitter_image' => Yii::t('app', 'Twitter Image'),
            'twitter_data1' => Yii::t('app', 'Twitter Data1'),
            'twitter_label1' => Yii::t('app', 'Twitter Label1'),
            'twitter_data2' => Yii::t('app', 'Twitter Data2'),
            'twitter_label2' => Yii::t('app', 'Twitter Label2'),
        ];
    }

    /**
     * @inheritdoc
     * @return \porcelanosa\yii2seo\models\query\SeoAttributesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \porcelanosa\yii2seo\models\query\SeoAttributesQuery(get_called_class());
    }
}
