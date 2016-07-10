<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table_seo_attributes`.
 */
class m160710_080019_create_table_seo_attributes extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%seo_attributes}}', [
            'id' => $this->primaryKey(),
            'model' => $this->string(255),
            'model_id' => $this->integer(),
            'title' => $this->string(255),
            'meta_descr' => $this->text(),
	        // Open Graph data
            'og_title' => $this->string(255), // ----
            'og_type' => $this->string(255),  // article, product
            'og_url' => $this->string(255),   //
            'og_image' => $this->string(255),
            'og_description' => $this->text(),
            'og_site_name' => $this->string(255),
	        // ... for article
            'article_published_time' => $this->string(255),
            'article_modified_time' => $this->string(255),
            'article_section' => $this->string(255),
            'article_tag' => $this->string(255),
            'fb_admins' => $this->string(255),
	        // ... for product
            'og_price_amout' => $this->string(255),
            'og_price_currency' => $this->string(255), // USD, RUB, EUR etc.
	        
	        // Schema.org data
            'itemscope' => $this->string(255), // Schema.org type Article, Blog, Book, Event, LocalBusiness, Organization, Person, Product or Review.
            'itemprop_name' => $this->string(255),
            'itemprop_description' => $this->string(255),
            'itemprop_image' => $this->string(255),
	        
	        // Twitter Card data
            'twitter_card' => $this->string(255), // summary
            'twitter_site' => $this->string(255), //  content="@publisher_handle"
            'twitter_title' => $this->string(255),
            'twitter_description' => $this->text(),
            'twitter_creator' => $this->string(255), // @author_name
            'twitter_image' => $this->string(255),
            'twitter_data1' => $this->string(255), //e.q. $3
            'twitter_label1' => $this->string(255),  // e.q. Price
            'twitter_data2' => $this->string(255),  // e.q. Black
            'twitter_label2' => $this->string(255),  // e.q. Color
	        
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%seo_attributes}}');
    }
}
