<?php

namespace porcelanosa\yii2seo\models\query;

/**
 * This is the ActiveQuery class for [[\porcelanosa\yii2seo\models\SeoAttributes]].
 *
 * @see \porcelanosa\yii2seo\models\SeoAttributes
 */
class SeoAttributesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \porcelanosa\yii2seo\models\SeoAttributes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \porcelanosa\yii2seo\models\SeoAttributes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
