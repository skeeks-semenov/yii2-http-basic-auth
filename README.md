Http basic auth for Yii2 project
===================================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist skeeks/yii2-http-basic-auth "*"
```

or add

```
"skeeks/yii2-http-basic-auth": "*"
```

Configuration app
----------
### Exemple 1

```php

'on beforeRequest' => function ($event) {
    \Yii::$app->httpBasicAuth->verify();
},

'components' =>
[
    'httpBasicAuth' =>
    [
        'class'             => 'skeeks\yii2\httpBasicAuth\HttpBasicAuthComponent',
        'login'             => 'login',
        'password'          => 'password',
        'usePasswordHash'   => false,                               //optionality
        'viewFail'          => '@app/views/http-basic-auth-fail'    //optionality
    ],

]

```
### Exemple 2

```php

'on beforeRequest' => function ($event) {
    //For example in addition to close the admin panel http authorization
    if (\Yii::$app->admin->requestIsAdmin)
    {
        \Yii::$app->httpBasicAuth->verify();
    }
},

'components' =>
[
    'httpBasicAuth' =>
    [
        'class'             => 'skeeks\yii2\httpBasicAuth\HttpBasicAuthComponent',
        'login'             => 'login',
        'password'          => 'password',
    ],

]

```

___

> [![skeeks!](https://gravatar.com/userimage/74431132/13d04d83218593564422770b616e5622.jpg)](http://skeeks.com)  
<i>SkeekS CMS (Yii2) — quickly, easily and effectively!</i>  
[skeeks.com](http://skeeks.com) | [en.cms.skeeks.com](http://en.cms.skeeks.com) | [cms.skeeks.com](http://cms.skeeks.com) | [marketplace.cms.skeeks.com](http://marketplace.cms.skeeks.com)


