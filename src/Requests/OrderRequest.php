<?php
namespace Bangbangda\FengQiao\Requests;

use Bangbangda\FengQiao\Formatter\XmlFormatter;

/**
 * 下单
 *
 * Class OrderRequest
 * @package Bangbangda\FengQiao
 */
class OrderRequest extends XmlFormatter
{

    public function getStubFile(): string
    {
        return __DIR__.'/../Formatter/stubs/order.stub';
    }

    /**
     * @return array|void
     */
    public function getReplaceKey() : array
    {
        return [
            'CustomerCode', 'OrderId',
            'FromCompany', 'FromContact', 'FromTel', 'FromMobile', 'FromProvince', 'FromCity', 'FromCounty', 'FromAddress',
            'ToCompany', 'ToContact', 'ToTel', 'ToMobile', 'ToProvince', 'ToCity', 'ToCounty', 'ToAddress',
            'PayMethod', 'CustomId', 'CargoName'
        ];
    }

}