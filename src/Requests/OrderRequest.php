<?php
namespace Aries\FengQiao\Requests;

use Aries\FengQiao\Formatter\XmlFormatter;

/**
 * 下单
 *
 * Class OrderRequest
 * @package Aries\FengQiao
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
            'CustomerCode', 'OrderId', 'Type', 'FromProvince', 'FromCity', 'FromCompany', 'FromContact', 'FromTel', 'FromAddress',
            'ToProvince', 'ToCity', 'ToCounty', 'ToCompany', 'ToContact', 'ToTel', 'ToAddress', 'ParcelQuantity',
            'PayMethod', 'CustomId', 'CargoName'
        ];
    }

}