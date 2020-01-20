<?php
namespace Bangbangda\FengQiao;

use Bangbangda\FengQiao\Formatter\XmlFormatter;
use GuzzleHttp\Client;
use Bangbangda\FengQiao\Exceptions\HttpException;
use Bangbangda\FengQiao\Exceptions\ConfigException;

class ExpressService
{
    private $checkWord = '';

    private $url = 'https://bsp-oisp.sf-express.com/';

    private $requestObj = null;

    /**
     * 设置应用校验码
     *
     * @param  string  $checkWord
     * @throws ConfigException
     */
    public function __construct(string $checkWord)
    {
        if (empty($checkWord)) {
            throw new ConfigException('请设置应用校验码');
        }

        $this->checkWord = $checkWord;
    }


    /**
     * 设置请求接口
     *
     * @param  XmlFormatter  $requestObj
     * @return $this
     */
    public function setRequest(XmlFormatter $requestObj)
    {
        $this->requestObj = $requestObj;
        return $this;
    }

    /**
     * 发起请求
     *
     * @throws HttpException
     */
    public function sendRequest()
    {
        $client = new Client([
            'base_uri' => $this->url,
            'timeout'  => 3.0,
            'headers'  => [
                'Content-type' => 'application/x-www-form-urlencoded',
                'charset' => 'utf-8'
            ]
        ]);

        $result = $client->post('bsp-oisp/sfexpressService', [
            'form_params' => [
                'xml' => $this->requestObj->format(),
                'verifyCode' => $this->verifyCode()
            ]
        ]);

        if ($result->getStatusCode() != 200) {
            throw new HttpException("接口请求失败");
        }

        return $this->requestObj->xmlToArray((string)$result->getBody());
    }

    /**
     * 获取秘钥
     *
     * @return string
     */
    public function verifyCode() : string
    {
        return base64_encode(md5(($this->requestObj->format() . $this->checkWord), TRUE));
    }

}