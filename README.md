[![Latest Stable Version](https://poser.pugx.org/porcelanosa/yii2-seo-attributes/v/stable?format=flat-square)](https://packagist.org/packages/porcelanosa/yii2-seo-attributes)
[![Latest Unstable Version](https://poser.pugx.org/porcelanosa/yii2-seo-attributes/v/unstable?format=flat-square)](https://packagist.org/packages/porcelanosa/yii2-seo-attributes)
[![Total Downloads](https://poser.pugx.org/porcelanosa/yii2-seo-attributes/downloads?format=flat-square)](https://packagist.org/packages/porcelanosa/yii2-seo-attributes)
[![License](https://poser.pugx.org/porcelanosa/yii2-seo-attributes/license)](https://packagist.org/packages/porcelanosa/yii2-seo-attributes)
[![composer.lock](https://poser.pugx.org/porcelanosa/yii2-seo-attributes/composerlock)](https://packagist.org/packages/porcelanosa/yii2-seo-attributes)

# yii2-seo-attributes
Yii2 extensions for adding seo attributes, like a  title, meta-keys, meta-descr and other, in entity
##Installition
```php
composer require porcelanosa/yii2-related
```
Run migration
```bash
$ php yii migrate/up --migrationPath=@vendor/porcelanosa/yii2-related/migrations
```
In model class add behavior 
```php
'seoBehavior' => [
    'class' => SeoBehavior::className(),
    'model_name' => MyHelper::modelFromNamespace($this::className()),
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