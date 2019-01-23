Http basic auth for Yii2 project
===================================

[![Latest Stable Version](https://img.shields.io/packagist/v/skeeks/yii2-http-basic-auth.svg)](https://packagist.org/packages/skeeks/yii2-http-basic-auth)
[![Total Downloads](https://img.shields.io/packagist/dt/skeeks/yii2-http-basic-auth.svg)](https://packagist.org/packages/skeeks/yii2-http-basic-auth)

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
Exemple 1
---------

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
Exemple 2
---------

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

> [![skeeks!](https://skeeks.com/img/logo/logo-no-title-80px.png)](https://skeeks.com)  
<i>SkeekS CMS (Yii2) — quickly, easily and effectively!</i>  
[skeeks.com](https://skeeks.com) | [cms.skeeks.com](https://cms.skeeks.com)



