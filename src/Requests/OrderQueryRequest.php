<?php
namespace Aries\FengQiao\Requests;

use Aries\FengQiao\Formatter\XmlFormatter;

/**
 * 订单查询
 *
 * Class OrderQueryRequest
 * @package Aries\FengQiao
 */
class OrderQueryRequest extends XmlFormatter
{

    /**
     * @return string
     */
    public function getStubFile(): string
    {
        return __DIR__.'/../Formatter/stubs/order_query.stub';
    }


    /**
     * @inheritDoc
     */
    public function getReplaceKey(): array
    {
       return ['CustomerCode', 'OrderId'];
    }
}