>**WARNING! This package is UNDER DEVELOPMENT**

[![Latest Stable Version](https://poser.pugx.org/porcelanosa/yii2-seo-attributes/v/stable?format=flat-square)](https://packagist.org/packages/porcelanosa/yii2-seo-attributes)
[![Latest Unstable Version](https://poser.pugx.org/porcelanosa/yii2-seo-attributes/v/unstable?format=flat-square)](https://packagist.org/packages/porcelanosa/yii2-seo-attributes)
[![Total Downloads](https://poser.pugx.org/porcelanosa/yii2-seo-attributes/downloads?format=flat-square)](https://packagist.org/packages/porcelanosa/yii2-seo-attributes)
[![License](https://poser.pugx.org/porcelanosa/yii2-seo-attributes/license?format=flat-square)](https://packagist.org/packages/porcelanosa/yii2-seo-attributes)
[![composer.lock](https://poser.pugx.org/porcelanosa/yii2-seo-attributes/composerlock?format=flat-square)](https://packagist.org/packages/porcelanosa/yii2-seo-attributes)

# yii2-seo-attributes
Yii2 extensions for adding seo attributes, like a  title, meta-keys, meta-descr and other, in entity
##Installition
```php
composer require porcelanosa/yii2-seo-attributes
```
Run migration
```bash
$ php yii migrate/up --migrationPath=@vendor/porcelanosa/yii2-seo-attributes/migrations
```
In model class add behavior 
```php
'seoBehavior' => [
    'class' => SeoBehavior::className(),
    'model_name' => $this::className(),
    'uploadPath' =>'@web/uploads/seoimage/'
],
```
In config add module
```php
'modules' => [
    ...
    'seo' => [
        'class' => 'porcelanosa\yii2seo\Module',
        'uploadPath' =>'@web/uploads/seoimage/'
    ],
    ...
]
```

In admin view
```php
echo \porcelanosa\yii2seo\SeoWidget::widget(
    [
        'model'        => $model,
        'form'         => $form,
        'behaviorName' => 'seoBehavior',
        'templateType' => 'minimum-minimorum' // 'minimal', 'standart', 'full'
    ] );
```
##Usage

```php
$this->title = $model->seo->title;
```

or meta-tag

```php
$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->seo->meta_descr]
);
```

or in controller action 
```php
if ($model->seo) {
    // page title
    $this->getView()->title = $model->seo->title;
    // meta keywords
    $this->getView()->registerMetaTag([
        'name'    => 'description',
        'content' => $model->seo->meta_descr,
    ])
    ;
}
```
![Screen shot](https://d1ro8r1rbfn3jf.cloudfront.net/ms_98568/gDS5xprqnmn1SeTdzsQgNSMkNHVaQ6/Developer%2BTools%2B-%2Bhttp___plex.local_admin_cats_update_1%2B2016-07-17%2B17.51.35.jpg)

##Social meta tags
Examples of using

https://moz.com/blog/meta-data-templates-123

or

http://www.iacquire.com/blog/18-meta-tags-every-webpage-should-have-in-2013

##### Twitter Card docs
https://dev.twitter.com/cards/overview

##### Open Graph docs
https://developers.facebook.com/docs/opengraph/getting-started

##### Google Schema.org docs
https://developers.google.com/+/web/snippet/

##### Schema.org types
http://schema.org/docs/schemas.html

## Template Types

Extension provide tmplate type: 'only2', 'minimum', 'standart', 'full'

[Full decription of template types](template-types.md)
