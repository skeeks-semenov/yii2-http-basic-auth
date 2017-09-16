Http basic auth for Yii2 project
===================================

[![Latest Stable Version](https://poser.pugx.org/skeeks/yii2-http-basic-auth/v/stable.png)](https://packagist.org/packages/skeeks/yii2-http-basic-auth)
[![Total Downloads](https://poser.pugx.org/skeeks/yii2-http-basic-auth/downloads.png)](https://packagist.org/packages/skeeks/yii2-http-basic-auth)
[![Reference Status](https://www.versioneye.com/php/skeeks:yii2-http-basic-auth/reference_badge.svg)](https://www.versioneye.com/php/skeeks:yii2-http-basic-auth/references)
[![Dependency Status](https://www.versioneye.com/php/skeeks:yii2-http-basic-auth/dev-master/badge.png)](https://www.versioneye.com/php/skeeks:yii2-http-basic-auth/dev-master)

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
<i>SkeekS CMS (Yii2) — fast, simple, effective!</i>  
[skeeks.com](https://skeeks.com) | [cms.skeeks.com](https://cms.skeeks.com)


