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

    /**
     * @var bool
     */
    public $usePasswordHash = false;

    /**
     * @var null
     */
    public $viewFail = null;


    public function verify()
    {
        if (\Yii::$app->request->authUser != $this->login || !$this->_verifyPassword())
        {
            $this->_fail();
        }
    }

    /**
     * @return bool
     */
    protected function _verifyPassword()
    {
        if ($this->usePasswordHash)
        {
            return (bool) (md5(\Yii::$app->request->authPassword) == $this->password);
        } else
        {
            return (bool) (\Yii::$app->request->authPassword == $this->password);
        }
    }

    protected function _fail()
    {
        $appName = \Yii::$app->name;

        if ($this->viewFail)
        {
            Header("WWW-Authenticate: Basic realm=\"{$appName}\"");
            Header("HTTP/1.0 401 Unauthorized");

            echo \Yii::$app->view->render($this->viewFail);
        } else
        {
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
        }

        exit;
    }

}
