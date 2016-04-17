<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 17.04.2016
 */
namespace skeeks\yii2\httpBasicAuth;
use yii\base\Component;

/**
 * Class HttpBasicAuthComponent
 * @package skeeks\yii2\httpBasicAuth
 */
class HttpBasicAuthComponent extends Component
{
    /**
     * @var string
     */
    public $login = 'login';

    /**
     * @var string
     */
    public $password = 'password';


    public function execute()
    {
        if (!isset($_SERVER['PHP_AUTH_PW']))
        {
            $this->_authentificateHttp();
        }

        if(!@$_SERVER['PHP_AUTH_PW'])
        {
            $this->_authentificateHttp();
        }

        else
        {
            if (@$_SERVER['PHP_AUTH_USER'] != $this->login || @$_SERVER['PHP_AUTH_PW'] != $this->password)
            {
                $this->_authentificateHttp();
            }
        }
    }

    protected function _authentificateHttp()
    {
        $appName = \Yii::$app->id;
        Header("WWW-Authenticate: Basic realm=\"{$appName}\"");
        Header("HTTP/1.0 401 Unauthorized");
        echo <<<HTML
        <style>
            .sx-title
            {
                text-align: center;
                font-size: 20px;
                padding: 200px;
            }
        </style>
        <p class="sx-title">{$appName} Authorization required.</p>
HTML;

        exit;
    }

}
